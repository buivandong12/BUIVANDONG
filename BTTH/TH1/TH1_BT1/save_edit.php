<?php
// Đọc danh sách hoa từ file
include 'flowers.php';

// Lấy ID từ tham số GET
$id = $_GET['id'] ?? null;

if ($id === null || !isset($flowers[$id])) {
    echo "Không tìm thấy hoa để sửa!";
    exit;
}

// Nhận dữ liệu từ form
$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';
$current_image = $_POST['current_image'] ?? '';
$image = $_FILES['image'] ?? null;

// Xử lý ảnh
$imagePath = $current_image;
if ($image && $image['tmp_name']) {
    $imagePath = 'images/' . basename($image['name']);
    move_uploaded_file($image['tmp_name'], $imagePath);
}

// Cập nhật thông tin hoa
$flowers[$id] = [
    "name" => $name,
    "description" => $description,
    "image" => $imagePath,
];

// Lưu danh sách hoa vào file
file_put_contents('flowers.php', "<?php\n\$flowers = " . var_export($flowers, true) . ";\n?>");

echo "Cập nhật thông tin hoa thành công!";
echo "<br><a href='index.php'>Quay lại danh sách</a>";
?>