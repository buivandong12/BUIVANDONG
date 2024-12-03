<?php
class ProductModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllProducts() {
        $query = "SELECT * FROM products";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addProduct($sanpham, $gia) {
        $query = "INSERT INTO products (sanpham, gia) VALUES (:sanpham, :gia)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':sanpham', $sanpham);
        $stmt->bindParam(':gia', $gia);
        return $stmt->execute();
    }

    public function getProductById($id) {
        $query = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProduct($id, $sanpham, $gia) {
        $query = "UPDATE products SET sanpham = :sanpham, gia = :gia WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':sanpham', $sanpham);
        $stmt->bindParam(':gia', $gia);
        return $stmt->execute();
    }

    public function deleteProduct($id) {
        $query = "DELETE FROM products WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>