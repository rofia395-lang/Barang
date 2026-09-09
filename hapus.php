<?php
    include "koneksi.php";
    $kode = $_GET['kode'];
 
    $sql = "DELETE FROM barang WHERE kode = '$kode'";
    $query = mysqli_query($database, $sql);
 
    if ($query) {
        header("Location: barangku.php");
    } else {
        echo "Data gagal dihapus: " . mysqli_error($database);
    }
?>