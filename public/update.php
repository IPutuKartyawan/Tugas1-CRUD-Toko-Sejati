<?php

require_once __DIR__ . '/../src/ProductRepository.php';
require_once __DIR__ . '/../src/Product.php';

$repo = new ProductRepository();

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}


$name = trim($_POST['name'] ?? '');
$category = trim($_POST['category'] ?? '');
$price = $_POST['price'] ?? '';
$stock = $_POST['stock'] ?? '';
$status = $_POST['status'] ?? 'active';
$old_image = $_POST['old_image'] ?? null;

$errors = [];

if ($name === '') $errors[] = 'Nama wajib diisi.';
if ($category === '') $errors[] = 'Kategori wajib diisi.';
if (!is_numeric($price) || $price < 0) $errors[] = 'Harga harus numeric dan >= 0.';
if (!is_numeric($stock) || $stock < 0) $errors[] = 'Stok harus numeric dan >= 0.';
if (!in_array($status, ['active', 'inactive'])) $errors[] = 'Status tidak valid.';


$image_path = $old_image;
if (!empty($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
    $file = $_FILES['image'];
    
    $allowedExt = ['jpg','jpeg','png'];
    $maxSize = 2 * 1024 * 1024;
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    $validMimes = ['image/jpeg', 'image/png'];

    if (!in_array($ext, $allowedExt) || !in_array($mime, $validMimes)) {
        $errors[] = 'Gambar harus berformat jpg/jpeg/png.';
    } elseif ($file['size'] > $maxSize) {
        $errors[] = 'Ukuran gambar maksimal 2MB.';
    } else {
        $uploadsDir = 'uploads';
        if (!is_dir($uploadsDir)) mkdir($uploadsDir, 0755, true);
        $newName = $uploadsDir . '/' . time() . '_' . bin2hex(random_bytes(5)) . '.' . $ext;
        if (!move_uploaded_file($file['tmp_name'], __DIR__ . '/' . $newName)) {
            $errors[] = 'Gagal mengunggah file.';
        } else {
        
            if (!empty($old_image) && file_exists(__DIR__ . '/' . $old_image)) {
                @unlink(__DIR__ . '/' . $old_image);
            }
            $image_path = $newName;
        }
    }
}

if (!empty($errors)) {
    echo "<h3>Kesalahan:</h3><ul>";
    foreach ($errors as $e) echo "<li>" . htmlspecialchars($e) . "</li>";
    echo "</ul><p><a href='edit.php?id=" . htmlspecialchars($id) . "'>Kembali</a></p>";
    exit;
}


$product = new Product($name, $category, $price, $stock, $image_path, $status);
$success = $repo->update($id, $product);

if ($success) {
    header('Location: index.php');
    exit;
} else {
    echo "Gagal mengupdate data. <a href='edit.php?id=" . htmlspecialchars($id) . "'>Kembali</a>";
}
