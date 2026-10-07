<?php
require_once '../config/db.php';

$id = $_GET['id'] ?? 0;

$query = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['submit'])) {
    $nama_produk = $_POST['nama_produk'];
    $kategori    = $_POST['kategori'];
    $harga       = $_POST['harga'];
    $stok        = $_POST['stok'];

    $updateQuery = "UPDATE products SET 
                    nama_produk = '$nama_produk', 
                    kategori = '$kategori', 
                    harga = '$harga', 
                    stok = '$stok' 
                    WHERE id = $id";

    if (mysqli_query($conn, $updateQuery)) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Gagal memperbarui data: " . mysqli_error($conn);
    }
}

$nama = $data['nama_produk'] ?? $data['name'] ?? '';
$kat  = $data['kategori'] ?? $data['category'] ?? '';
$hrg  = (int)($data['harga'] ?? $data['price'] ?? 0);
$stk  = (int)($data['stok'] ?? $data['stock'] ?? 0);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Inventaris Produk - Edit Produk</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

    <div class="container" style="max-width: 650px;">
        <div class="header-section">
            <div class="header-title">
                <h1>✏️ Edit Produk</h1>
                <p>Ubah informasi produk inventaris di bawah ini.</p>
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
                <input type="text" name="nama_produk" value="<?= htmlspecialchars($nama); ?>" required style="width: 100%; padding: 12px 16px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 0.95rem; outline: none; background-color: #f8fafc;">
            </div>

            <div style="margin-bottom: 18px;">
                <label style="display: block; font-size: 0.88rem; font-weight: 600; color: #334155; margin-bottom: 8px;">Kategori</label>
                <input type="text" name="kategori" value="<?= htmlspecialchars($kat); ?>" required style="width: 100%; padding: 12px 16px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 0.95rem; outline: none; background-color: #f8fafc;">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 24px;">
                <div>
                    <label style="display: block; font-size: 0.88rem; font-weight: 600; color: #334155; margin-bottom: 8px;">Harga (Rp)</label>
                    <input type="number" name="harga" value="<?= $hrg; ?>" required style="width: 100%; padding: 12px 16px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 0.95rem; outline: none; background-color: #f8fafc;">
                </div>

                <div>
                    <label style="display: block; font-size: 0.88rem; font-weight: 600; color: #334155; margin-bottom: 8px;">Jumlah Stok</label>
                    <input type="number" name="stok" value="<?= $stk; ?>" required style="width: 100%; padding: 12px 16px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 0.95rem; outline: none; background-color: #f8fafc;">
                </div>
            </div>

            <div style="display: flex; align-items: center; gap: 12px;">
                <button type="submit" name="submit" class="btn-add" style="border: none; cursor: pointer;">Update Produk</button>
                <a href="index.php" style="color: #64748b; text-decoration: none; font-weight: 600; font-size: 0.95rem; padding: 10px 20px; border-radius: 10px; background-color: #f1f5f9;">Batal</a>
            </div>
        </form>
    </div>

</body>
</html>