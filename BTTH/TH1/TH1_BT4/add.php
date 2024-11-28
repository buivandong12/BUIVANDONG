<?php
include 'db.php';

// Tạo thư mục images nếu chưa có
if (!is_dir('images')) {
    mkdir('images', 0777, true); // Tạo thư mục với quyền ghi đầy đủ
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Nhận thông tin từ form
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Xử lý ảnh
    $imagePath = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image'];
        $imagePath = 'images/' . basename($image['name']);
        move_uploaded_file($image['tmp_name'], $imagePath);
    }

    // Thêm hoa vào CSDL
    try {
        $stmt = $pdo->prepare("INSERT INTO flowers (name, description, image) VALUES (?, ?, ?)");
        $stmt->execute([$name, $description, $imagePath]);

        echo "Hoa mới đã được thêm thành công!";
        echo "<a href='index.php'>Quay lại danh sách</a>";
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Tên hoa" required><br>
    <textarea name="description" placeholder="Mô tả hoa" required></textarea><br>
    <input type="file" name="image" required><br>
    <button type="submit">Thêm hoa</button>
</form>
