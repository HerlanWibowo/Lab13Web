<?php
include("koneksi.php");
require ("../../template/header.php");
require ("../../template/footer.php");
// query untuk menampilkan data
$sql = "SELECT * FROM data_barang";
$result = mysqli_query($conn, $sql);

$sql_count = "SELECT COUNT(*) FROM data_barang";

if(isset($sql_where)){
    $sql .= $sql_where;
    $sql_count .= $sql_where;
}
$result_count = mysqli_query($conn, $sql_count);
$count = 0;
if ($result_count) {
    $r_data = mysqli_fetch_row($result_count);
    $count = $r_data[0];
}
$per_page = 1;
$num_page = ceil($count/$per_page);
$limit = $per_page;
if (isset($_GET['page'])){
    $page = $_GET['page'];
    $oofset = ($page - 1) * $per_page;
} else {
    $page=1;
    $offset=0;
}
$sql .= "LIMIT {$offset}, {$limit}";

$q = "";
$sql_where = "";
if (isset($_GET['submit']) && !empty($_GET['q'])) {
    $q = $_GET['q'];
    $sql_where = " WHERE nama LIKE '{$q}%'";
}

$sql = "SELECT * FROM data_barang";
if (!empty($sql_where)) {
    $sql .= $sql_where;
}
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="../../style.css" rel="stylesheet" type="text/css" />
    <title>Data Barang</title>
</head>

<body>
    <div class="container">
        <hr><h1>Data Barang</h1>
        <a class="tambah" href="tambah.php">Tambah Barang</a>
        <form action="" method="get" style="margin-top:10px;">
            <label for="q">Cari data:</label>
            <input type="text" id="q" name="q" class="input-q" value="<?php echo $q ?>">
            <input type ="submit" name="submit" value="Cari" style="padding:5px;color:white;background-color:navy">
        <?php if ($result): ?>
        <div class="main">
            <table>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Katagori</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
                <?php if ($result): ?>
                <?php while ($row = mysqli_fetch_array($result)): ?>
                <tr>
                    <td><img src="gambar/<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>"></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['kategori']; ?></td>
                    <td><?= $row['harga_beli']; ?></td>
                    <td><?= $row['harga_jual']; ?></td>
                    <td><?= $row['stok']; ?></td>
                    <td>
                        <a class ="ubah" href ="ubah.php">Ubah</a>
                        <a class = "delete" href="hapus.php" onclick="return confirm('Are you sure you want to delete this item?')">Hapus</a>
                    </td>
                    
                </tr>
                <?php endwhile; else: ?>
                <tr>
                    <td colspan="7">Belum ada data</td>
                </tr>
            <?php endif; ?>
            </table>
            <ul class=pagination>
                <li><a href="#">&laquo;</a></li>
                <?php for ($i=1; $i <= $num_page; $i++){
                    $link = "?page={$i}";
                    if (!empty($q)) $link .= "&q={$q}";
                    $class = ($page == $i ? 'active' : '');
                    echo "<li><a class = \"{$class}\" href = \"{$link}\">{$i}</a></li>";
                }?>
                <li><a href="#">&raquo;</a></li>
            </ul>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>