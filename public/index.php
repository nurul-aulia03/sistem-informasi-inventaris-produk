<?php
require_once '../config/db.php';

$query = "SELECT * FROM products ORDER BY id DESC";
$result = mysqli_query($conn, $query);

$total_jenis = mysqli_num_rows($result);
$total_stok = 0;
$total_nilai_inventaris = 0; // Inisialisasi total nilai seluruh barang

$products = [];
while ($row = mysqli_fetch_assoc($result)) {
    $stok = (int)($row['stok'] ?? $row['stock'] ?? 0);
    $harga = (int)($row['harga'] ?? $row['price'] ?? 0);

    $total_stok += $stok;
    $total_nilai_inventaris += ($harga * $stok); // Menghitung total harga seluruh stok barang

    $row['stok_fix'] = $stok;
    $row['harga_fix'] = $harga;
    $products[] = $row;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Inventaris Produk</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

    <div class="container">
        
        <!-- Header Section -->
        <div class="header-section">
            <div class="header-title">
                <h1>📦 Sistem Informasi Inventaris Produk</h1>
                <p>Kelola inventaris barang, stok, dan harga toko Anda secara real-time.</p>
            </div>
            <a href="index.php" class="badge-dashboard" style="text-decoration: none;">
                🏠 Dashboard
            </a>
        </div>

        <!-- Metric Cards (3 Kolom) -->
        <div class="stats-grid" style="grid-template-columns: repeat(3, 1fr);">
            <div class="stat-card">
                <div class="label">TOTAL JENIS PRODUK</div>
                <div class="value"><?= $total_jenis; ?> Item</div>
            </div>
            <div class="stat-card">
                <div class="label">TOTAL STOK TERSEDIA</div>
                <div class="value"><?= number_format($total_stok); ?> Unit</div>
            </div>
            <div class="stat-card">
                <div class="label">TOTAL NILAI INVENTARIS</div>
                <div class="value">Rp <?= number_format($total_nilai_inventaris, 0, ',', '.'); ?></div>
            </div>
        </div>

        <!-- Action & Live Search Input -->
        <div class="action-bar">
            <a href="create.php" class="btn-add">+ Tambah Produk Baru</a>

            <div class="search-box">
                <input type="text" id="searchInput" onkeyup="liveSearch()" placeholder="Cari nama atau kategori...">
            </div>
        </div>

        <!-- Tabel Produk -->
        <table id="productTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAMA PRODUK</th>
                    <th>KATEGORI</th>
                    <th>HARGA</th>
                    <th>STOK</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($products) > 0): ?>
                    <?php foreach ($products as $row): ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><strong><?= htmlspecialchars($row['nama_produk'] ?? $row['name'] ?? ''); ?></strong></td>
                        <td><span class="badge-kategori"><?= htmlspecialchars($row['kategori'] ?? $row['category'] ?? '-'); ?></span></td>
                        <td>Rp <?= number_format($row['harga_fix'], 0, ',', '.'); ?></td>
                        <td><?= $row['stok_fix']; ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id']; ?>" class="btn-edit-link">Edit</a>
                            <a href="delete.php?id=<?= $row['id']; ?>" class="btn-delete-link">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr id="noDataRow">
                        <td colspan="6" style="text-align: center; color: #94a3b8; padding: 24px;">Data produk belum ada.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>

    <!-- Live Search JavaScript -->
    <script>
        function liveSearch() {
            let input = document.getElementById('searchInput').value.toLowerCase();
            let table = document.getElementById('productTable');
            let tr = table.getElementsByTagName('tr');

            for (let i = 1; i < tr.length; i++) {
                let row = tr[i];
                if (row.id === 'noDataRow') continue;

                let name = row.getElementsByTagName('td')[1]?.textContent.toLowerCase() || '';
                let category = row.getElementsByTagName('td')[2]?.textContent.toLowerCase() || '';

                if (name.includes(input) || category.includes(input)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        }
    </script>

</body>
</html>