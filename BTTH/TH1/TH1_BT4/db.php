<?php
$host = 'localhost';
$dbname = 'flowers_db';
$username = 'root';  // Mặc định của XAMPP là root
$password = '';      // Mặc định không có mật khẩu

try {
    // Tạo kết nối tới CSDL
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Thiết lập chế độ báo lỗi
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Lỗi kết nối CSDL: " . $e->getMessage();
}
?>
