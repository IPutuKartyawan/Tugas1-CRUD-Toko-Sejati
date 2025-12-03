<?php
$categories = ['Elektronik', 'Fashion', 'Makanan', 'Aksesoris', 'Lainnya'];
$statuses = ['active' => 'Active', 'inactive' => 'Inactive'];
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <h1>Tambah Produk</h1>
    <form action="store.php" method="post" enctype="multipart/form-data">
        <div>
            <label>Nama:</label><br>
            <input type="text" name="name" required maxlength="100">
        </div>
        <div>
            <label>Kategori:</label><br>
            <select name="category" required>
                <?php foreach ($categories as $c): ?>
                    <option value="<?= htmlspecialchars($c) ?>"><?= htmlspecialchars($c) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label>Harga:</label><br>
            <input type="number" step="0.01" name="price" required min="0">
        </div>
        <div>
            <label>Stok:</label><br>
            <input type="number" name="stock" required min="0">
        </div>
        <div>
            <label>Gambar (jpg/png, max 2MB):</label><br>
            <input type="file" name="image" accept=".jpg,.jpeg,.png">
        </div>
        <div>
            <label>Status:</label><br>
            <select name="status" required>
                <?php foreach ($statuses as $val => $label): ?>
                    <option value="<?= $val ?>"><?= $label ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>
        <button type="submit">Simpan</button>
    </form>
    <p><a href="index.php">Kembali</a></p>
</body>
</html>
