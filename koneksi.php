<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $nama_db = "db_barang";
 
    $database = mysqli_connect($host, $user, $pass, $nama_db);
 
    if (!$database) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }
?>