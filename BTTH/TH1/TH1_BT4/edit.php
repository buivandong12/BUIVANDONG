<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Lấy thông tin hoa từ CSDL
    $stmt = $pdo->prepare("SELECT * FROM flowers WHERE id = ?");
    $stmt->execute([$id]);
    $flower = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$flower) {
        echo "Hoa không tồn tại!";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Xử lý sửa thông tin
        $name = $_POST['name'];
        $description = $_POST['description'];
        $imagePath = $flower['image']; // Giữ nguyên ảnh cũ

        // Xử lý ảnh mới nếu có
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = $_FILES['image'];
            $imagePath = 'images/' . basename($image['name']);
            move_uploaded_file($image['tmp_name'], $imagePath);
        }

        // Cập nhật thông tin vào CSDL
        $stmt = $pdo->prepare("UPDATE flowers SET name = ?, description = ?, image = ? WHERE id = ?");
        $stmt->execute([$name, $description, $imagePath, $id]);

        echo "Cập nhật thành công!";
        echo "<a href='index.php'>Quay lại danh sách</a>";
        exit;
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="name" value="<?= $flower['name'] ?>" required><br>
    <textarea name="description" required><?= $flower['description'] ?></textarea><br>
    <img src="<?= $flower['image'] ?>" width="100"><br>
    <input type="file" name="image"><br>
    <button type="submit">Cập nhật</button>
</form>
