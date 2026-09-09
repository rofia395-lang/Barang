<?php
    include "koneksi.php";
    $kode = $_GET['kode'];
    $sql  = "SELECT * FROM barang WHERE kode = '$kode'";
    $query = mysqli_query($database, $sql);
    $isi = mysqli_fetch_array($query);
?>
<html>
<head><title>Edit Barang</title></head>
<body>
<h1>Edit Data Barang</h1>
<form action="update.php" method="post">
<input type="hidden" name="kode" value="<?php echo $isi['kode']; ?>">
Nama : <input type="text" name="nama" value="<?php echo $isi['nama']; ?>"><br><br>
Harga: <input type="number" name="harga" value="<?php echo $isi['harga']; ?>"><br><br>
Qty  : <input type="number" name="qty" value="<?php echo $isi['qty']; ?>"><br><br>
<input type="submit" value="Update">
</form>
</body>
</html>