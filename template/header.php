<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contoh Modularisasi</title>

    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: "Roboto", sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            height:610px;
            /* Mengisi seluruh tinggi viewport */
            position: relative;
        }

        nav {
            width: 100%;
            background-color: navy;
            padding: 0px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        nav>a {
            text-decoration: none;
            color: white;
            padding: 10px;
            margin: 10px 5px;
            border-radius: 5px;
        }

        nav>a:hover,
        nav>a.active {
            background-color: rgb(66, 66, 193) ;
        }

        header {
            text-align: center;
            padding: 20px;
        }

        header code {
            color: crimson;
        }

        .content {
            background-color: rgb(165, 165, 165);
            color: black;
            width: 100%;
            height:370px;
            margin: auto;
            margin-bottom: 50px;
            padding: 20px;
            border-radius: 5px;
        }

        .content h2 {
            margin-bottom: 20px;

        }

        .content span {
            color: rgb(52, 55, 57);
        }

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: navy;
            text-align: center;
            padding: 20px 0;
            color: white;
        }
    </style>
    
</head>

<body>
    <div class="container">
        <header>
            <h1>Modularisasi Menggunakan Require</h1>
        </header>
        <nav>
            <a href="../module/home.php">Home</a>
            <a href="../template/about.php">Tentang</a>
            <a href="../module/artikel/index.php" target="_blank">Daftar</a>
            <a href="../class/login.php">Login</a>
        </nav>