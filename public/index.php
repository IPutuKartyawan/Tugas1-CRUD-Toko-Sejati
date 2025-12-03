<?php
// Tunda dulu
require_once __DIR__ . '/../src/ProductRepository.php';
$repo = new ProductRepository();
$products = $repo->getAll();
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Daftar Produk Toko Segar Sejati</h1>
    <p><a href="create.php">Tambah Produk</a></p>

    <table>
        <thead>
            <tr>
                <th>ID</th><th>Gambar</th><th>Nama</th><th>Kategori</th><th>Harga</th><th>Stok</th><th>Status</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($products) === 0): ?>
                <tr><td colspan="8">Belum ada data.</td></tr>
            <?php else: ?>
                <?php foreach ($products as $p): ?>
                    <tr>
                        <td><?= htmlspecialchars($p['id']) ?></td>
                        <td>
                            <?php if (!empty($p['image_path']) && file_exists(__DIR__ . '/'. $p['image_path'])): ?>
                                <img src="<?= htmlspecialchars($p['image_path']) ?>" alt="gambar">
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($p['name']) ?></td>
                        <td><?= htmlspecialchars($p['category']) ?></td>
                        <td><?= number_format($p['price'], 2) ?></td>
                        <td><?= htmlspecialchars($p['stock']) ?></td>
                        <td><?= htmlspecialchars($p['status']) ?></td>
                        <td class="actions">
                            <a href="edit.php?id=<?= $p['id'] ?>">Edit</a>
                            <a href="delete.php?id=<?= $p['id'] ?>" onclick="return confirm('Hapus produk ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
