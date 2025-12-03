<?php

require_once __DIR__ . '/../src/ProductRepository.php';
$repo = new ProductRepository();

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}

$product = $repo->find($id);
if (!$product) {
    echo "Produk tidak ditemukan. <a href='index.php'>Kembali</a>";
    exit;
}

$categories = ['Elektronik', 'Fashion', 'Makanan', 'Aksesoris', 'Lainnya'];
$statuses = ['active' => 'Active', 'inactive' => 'Inactive'];
?>
<!doctype html>
<html>
<head><meta charset="utf-8">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Edit Produk</h1>
    <form action="update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">
        <div>
            <label>Nama:</label><br>
            <input type="text" name="name" required maxlength="100" value="<?= htmlspecialchars($product['name']) ?>">
        </div>
        <div>
            <label>Kategori:</label><br>
            <select name="category" required>
                <?php foreach ($categories as $c): ?>
                    <option value="<?= htmlspecialchars($c) ?>" <?= $product['category'] === $c ? 'selected' : '' ?>><?= htmlspecialchars($c) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label>Harga:</label><br>
            <input type="number" step="0.01" name="price" required min="0" value="<?= htmlspecialchars($product['price']) ?>">
        </div>
        <div>
            <label>Stok:</label><br>
            <input type="number" name="stock" required min="0" value="<?= htmlspecialchars($product['stock']) ?>">
        </div>
        <div>
            <label>Gambar (kosongkan jika tidak ingin mengganti):</label><br>
            <?php if (!empty($product['image_path']) && file_exists(__DIR__ . '/' . $product['image_path'])): ?>
                <img src="<?= htmlspecialchars($product['image_path']) ?>" style="max-width:150px;"><br>
            <?php endif; ?>
            <input type="file" name="image" accept=".jpg,.jpeg,.png">
            <input type="hidden" name="old_image" value="<?= htmlspecialchars($product['image_path']) ?>">
        </div>
        <div>
            <label>Status:</label><br>
            <select name="status" required>
                <?php foreach ($statuses as $val => $label): ?>
                    <option value="<?= $val ?>" <?= $product['status'] === $val ? 'selected' : '' ?>><?= $label ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>
        <button type="submit">Update</button>
    </form>
    <p><a href="index.php">Kembali</a></p>
</body>
</html>
