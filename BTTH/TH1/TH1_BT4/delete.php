<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Lấy thông tin hoa trước khi xóa (để xóa ảnh nếu cần)
    $stmt = $pdo->prepare("SELECT image FROM flowers WHERE id = ?");
    $stmt->execute([$id]);
    $flower = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($flower) {
        // Xóa hoa trong CSDL
        $stmt = $pdo->prepare("DELETE FROM flowers WHERE id = ?");
        $stmt->execute([$id]);

        // Xóa ảnh nếu có
        if (file_exists($flower['image'])) {
            unlink($flower['image']);
        }

        echo "Hoa đã được xóa!";
        echo "<a href='index.php'>Quay lại danh sách</a>";
    } else {
        echo "Hoa không tồn tại!";
    }
}
?>
