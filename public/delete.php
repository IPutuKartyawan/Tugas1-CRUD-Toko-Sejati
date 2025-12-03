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

// optionally delete image file
if (!empty($product['image_path']) && file_exists(__DIR__ . '/' . $product['image_path'])) {
    @unlink(__DIR__ . '/' . $product['image_path']);
}

$repo->delete($id);
header('Location: index.php');
exit;
