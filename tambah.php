<html>
<head>
    <title>Tambah Barang</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; padding-top: 50px; }
        .form-container { background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        h1 { font-size: 24px; color: #333; margin-top: 0; text-align: center; margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; font-weight: bold; margin-bottom: 5px; color: #555; }
        .form-group input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .form-group input:focus { border-color: #2980b9; outline: none; }
        .btn-submit { width: 100%; background-color: #2980b9; color: white; padding: 12px; border: none; border-radius: 4px; font-size: 16px; cursor: pointer; font-weight: bold; }
        .btn-submit:hover { background-color: #1f6391; }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Tambah Data Barang</h1>
        <form action="simpan.php" method="post">
            <div class="form-group">
                <label>Kode Barang:</label>
                <!-- Atribut required bisa ditambahkan sebagai proteksi lapis pertama di sisi klien -->
                <input type="text" name="kode" required>
            </div>
            <div class="form-group">
                <label>Nama Barang:</label>
                <input type="text" name="nama" required>
            </div>
            <div class="form-group">
                <label>Harga Satuan:</label>
                <input type="number" name="harga" required>
            </div>
            <div class="form-group">
                <label>Jumlah (Qty):</label>
                <input type="number" name="qty" required>
            </div>
            <input type="submit" value="Simpan Data" class="btn-submit">
        </form>
    </div>
</body>
</html>