<?php
session_start();
$title = 'Data Barang';
include_once '../module/artikel/koneksi.php';
if (isset($_POST['submit']))
{
 $user = $_POST['user'];
 $password = $_POST['password'];

 $sql = "SELECT * FROM user WHERE username = '{$user}'

AND password = ('{$password}') ";
$result = mysqli_query($conn, $sql);
    if ($result && mysqli_affected_rows($conn) != 0)
    {
        $_SESSION['isLogin'] = true;
        $_SESSION['user'] = mysqli_fetch_array($result);
        header('location: ../module/artikel/index.php');
    } else
        $errorMsg = "<p style=\"color:red;\">Gagal Login,
        silakan ulangi lagi.</p>";
    }
include_once "../template/header.php";
if (isset($errorMsg)) echo $errorMsg;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        h2 {
            text-align: center;
            margin: 20px 0;
        }
        .login-container {
            display:flex;
            justify-content: center;
            align-items: center;
        }
        form {
            width: 300px;
            padding: 20px;
            box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
            border-radius: 5px;
        }
        label {
            display:block;
            margin-bottom:8px;
        }
        input[type="text"], input[type="password"] {
            width: 80%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Login</h2>
    <div class="login-container">
        <form method="post" class="form_login">
            <div class="input">
                <label>Username</label><br>
                <input type="text" name="user" />
            </div><br>
            <div class="input">
                <label>Password</label><br>
                <input type="password" name="password" />
            </div><br>
            <div class="submit">
                <input type="submit" name="submit" value="Login" />
            </div>
        </form>
    </div>
</body>
</html>

<?php
include_once '../template/footer.php';
?>
