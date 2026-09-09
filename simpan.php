<?php
    include "koneksi.php";

    $kode  = $_POST['kode'];
    $nama  = $_POST['nama'];
    $harga = $_POST['harga'];
    $qty   = $_POST['qty'];

    // Validasi 1: Kode barang tidak boleh kosong
    if (empty($kode)) {
        echo "<script>
                alert('Gagal: Kode barang tidak boleh kosong!'); 
                window.location='tambah.php';
              </script>";
        exit;
    }

    // Validasi 2: Kode barang tidak boleh duplikat
    $cek_kode = mysqli_query($database, "SELECT kode FROM barang WHERE kode = '$kode'");
    if (mysqli_num_rows($cek_kode) > 0) {
        echo "<script>
                alert('Gagal: Kode barang sudah terdaftar (duplikat)! Gunakan kode lain.'); 
                window.location='tambah.php';
              </script>";
        exit;
    }

    // Jika validasi lolos, simpan data ke database
    $sql = "INSERT INTO barang (kode, nama, harga, qty)
            VALUES ('$kode', '$nama', '$harga', '$qty')";
    $query = mysqli_query($database, $sql);

    if ($query) {
        header("Location: barangku.php");
    } else {
        echo "Data gagal disimpan: " . mysqli_error($database);
    }
?>