<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f7f6; color: #333; }
        h1 { color: #2c3e50; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; background-color: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #34495e; color: white; }
        tr:hover { background-color: #f1f1f1; }
        .btn { padding: 6px 12px; text-decoration: none; color: white; border-radius: 4px; font-size: 14px; }
        .btn-edit { background-color: #27ae60; }
        .btn-hapus { background-color: #e74c3c; }
        .btn-tambah { background-color: #2980b9; margin-bottom: 15px; display: inline-block; padding: 10px 15px; }
        .search-box { margin-bottom: 20px; background: #fff; padding: 15px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .search-box input[type="text"] { padding: 8px; width: 250px; border: 1px solid #ccc; border-radius: 4px; }
        .search-box input[type="submit"] { padding: 8px 15px; background-color: #34495e; color: white; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Data Barang</h1>

    <!-- Fitur Pencarian Data Barang -->
    <div class="search-box">
        <form action="barangku.php" method="get">
            Cari Nama Barang: 
            <input type="text" name="cari" placeholder="Masukkan nama barang..." value="<?php echo isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">
            <input type="submit" value="Cari">
        </form>
    </div>

    <a href="tambah.php" class="btn btn-tambah">+ Tambah Data Baru</a>

    <table>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th> <!-- Tambahan Kolom Total -->
            <th>Aksi</th>  <!-- Tambahan Kolom Aksi -->
        </tr>
        <?php
        $sql = "SELECT * FROM barang";
        
        // Logika Pencarian
        if (isset($_GET['cari']) && $_GET['cari'] != '') {
            $cari = $_GET['cari'];
            $sql = "SELECT * FROM barang WHERE nama LIKE '%$cari%'";
        }

        $query = mysqli_query($database, $sql);
        $total_keseluruhan = 0; // Variabel penyimpan total keseluruhan

        while ($isi = mysqli_fetch_array($query)) {
            $total = $isi['harga'] * $isi['qty']; // Perhitungan harga x qty
            $total_keseluruhan += $total; // Akumulasi
        ?>
        <tr>
            <td><?php echo $isi['kode']; ?></td>
            <td><?php echo $isi['nama']; ?></td>
            <td>Rp <?php echo number_format($isi['harga'], 0, ',', '.'); ?></td>
            <td><?php echo $isi['qty']; ?></td>
            <td>Rp <?php echo number_format($total, 0, ',', '.'); ?></td>
            <td>
                <a href="edit.php?kode=<?php echo $isi['kode']; ?>" class="btn btn-edit">Edit</a>
                <a href="hapus.php?kode=<?php echo $isi['kode']; ?>" class="btn btn-hapus" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
        
        <!-- Baris Total Keseluruhan -->
        <tr>
            <td colspan="4" style="text-align:right; font-weight:bold;">Total Keseluruhan</td>
            <td colspan="2" style="font-weight:bold; color: #2c3e50;">Rp <?php echo number_format($total_keseluruhan, 0, ',', '.'); ?></td>
        </tr>
    </table>
</body>
</html>