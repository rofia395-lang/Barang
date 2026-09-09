<?php
    include "koneksi.php";
 
    $kode  = $_POST['kode'];
    $nama  = $_POST['nama'];
    $harga = $_POST['harga'];
    $qty   = $_POST['qty'];
 
    $sql = "UPDATE barang SET
            nama = '$nama', harga = '$harga', qty = '$qty'
            WHERE kode = '$kode'";
    $query = mysqli_query($database, $sql);
 
    if ($query) {
        header("Location: barangku.php");
    } else {
        echo "Data gagal diperbarui: " . mysqli_error($database);
    }
?>