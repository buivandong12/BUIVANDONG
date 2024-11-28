<?php
// Đọc danh sách hoa từ file
include 'flowers.php';

// Lấy ID từ tham số GET
$id = $_GET['id'] ?? null;

// Kiểm tra ID hợp lệ
if ($id === null || !isset($flowers[$id])) {
    echo "Không tìm thấy hoa cần sửa!";
    exit;
}

$flower = $flowers[$id];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin hoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Sửa thông tin hoa</h1>
    <form action="save_edit.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Tên hoa</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $flower['name'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control" id="description" name="description" rows="3" required><?= $flower['description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="current_image" class="form-label">Ảnh hiện tại</label><br>
            <img src="<?= $flower['image'] ?>" alt="<?= $flower['name'] ?>" style="width: 100px;"><br>
            <input type="hidden" name="current_image" value="<?= $flower['image'] ?>">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Thay ảnh mới (nếu cần)</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="index.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
