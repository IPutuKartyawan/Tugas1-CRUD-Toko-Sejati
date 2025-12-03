<?php

require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/Product.php';

class ProductRepository {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM products ORDER BY id ASC");
        return $stmt->fetchAll();
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function insert(Product $p) {
        $sql = "INSERT INTO products (name, category, price, stock, image_path, status)
                VALUES (:name, :category, :price, :stock, :image_path, :status)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':name' => $p->name,
            ':category' => $p->category,
            ':price' => $p->price,
            ':stock' => $p->stock,
            ':image_path' => $p->image_path,
            ':status' => $p->status
        ]);
    }

    public function update($id, Product $p) {
        $sql = "UPDATE products
                SET name = :name, category = :category, price = :price, stock = :stock, image_path = :image_path, status = :status
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':name' => $p->name,
            ':category' => $p->category,
            ':price' => $p->price,
            ':stock' => $p->stock,
            ':image_path' => $p->image_path,
            ':status' => $p->status,
            ':id' => $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
