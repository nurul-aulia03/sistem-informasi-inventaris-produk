<?php
require_once '../config/db.php';

if (isset($_POST['submit'])) {
    $nama_produk = $_POST['nama_produk'];
    $kategori    = $_POST['kategori'];
    $harga       = $_POST['harga'];
    $stok        = $_POST['stok'];

    $query = "INSERT INTO products (nama_produk, kategori, harga, stok) VALUES ('$nama_produk', '$kategori', '$harga', '$stok')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Gagal menambahkan produk: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Inventaris Produk - Tambah Produk</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

    <div class="container" style="max-width: 650px;">
        <div class="header-section">
            <div class="header-title">
                <h1>➕ Tambah Produk Baru</h1>
                <p>Masukkan rincian informasi barang yang ingin ditambahkan ke inventaris.</p>
            </div>
            <a href="index.php" class="badge-dashboard" style="text-decoration: none; display: inline-block;">
                🏠 Dashboard
            </a>
        </div>

        <?php if (isset($error)): ?>
            <div style="background-color: #fee2e2; color: #dc2626; padding: 12px 16px; border-radius: 10px; margin-bottom: 20px; font-size: 0.9rem;">
                <?= $error; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST">
            <div style="margin-bottom: 18px;">
                <label style="display: block; font-size: 0.88rem; font-weight: 600; color: #334155; margin-bottom: 8px;">Nama Produk</label>
                <input type="text" name="nama_produk" placeholder="Contoh: Laptop Asus ROG" required style="width: 100%; padding: 12px 16px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 0.95rem; outline: none; background-color: #f8fafc;">
            </div>

            <div style="margin-bottom: 18px;">
                <label style="display: block; font-size: 0.88rem; font-weight: 600; color: #334155; margin-bottom: 8px;">Kategori</label>
                <input type="text" name="kategori" placeholder="Contoh: Elektronik / Pakaian" required style="width: 100%; padding: 12px 16px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 0.95rem; outline: none; background-color: #f8fafc;">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 24px;">
                <div>
                    <label style="display: block; font-size: 0.88rem; font-weight: 600; color: #334155; margin-bottom: 8px;">Harga (Rp)</label>
                    <input type="number" name="harga" placeholder="Contoh: 1500000" required style="width: 100%; padding: 12px 16px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 0.95rem; outline: none; background-color: #f8fafc;">
                </div>

                <div>
                    <label style="display: block; font-size: 0.88rem; font-weight: 600; color: #334155; margin-bottom: 8px;">Jumlah Stok</label>
                    <input type="number" name="stok" placeholder="Contoh: 10" required style="width: 100%; padding: 12px 16px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 0.95rem; outline: none; background-color: #f8fafc;">
                </div>
            </div>

            <div style="display: flex; align-items: center; gap: 12px;">
                <button type="submit" name="submit" class="btn-add" style="border: none; cursor: pointer;">Simpan Produk</button>
                <a href="index.php" style="color: #64748b; text-decoration: none; font-weight: 600; font-size: 0.95rem; padding: 10px 20px; border-radius: 10px; background-color: #f1f5f9;">Batal</a>
            </div>
        </form>
    </div>

</body>
</html>