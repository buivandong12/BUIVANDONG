<?php
// Đọc danh sách hoa từ file nếu tồn tại
if (file_exists('flowers.php')) {
    include 'flowers.php';
} else {
    $flowers = []; // Nếu chưa có file thì tạo mảng rỗng
}

// Tạo thư mục images nếu chưa tồn tại
if (!is_dir('images')) {
    mkdir('images', 0777, true); // Tạo thư mục với quyền ghi đầy đủ
}

// Xử lý tải lên ảnh
$imagePath = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $image = $_FILES['image'];
    $imagePath = 'images/' . basename($image['name']);

    // Di chuyển ảnh tải lên vào thư mục
    if (move_uploaded_file($image['tmp_name'], $imagePath)) {
        echo "Ảnh đã được tải lên thành công!<br>";
    } else {
        echo "Lỗi: Không thể di chuyển ảnh đến thư mục đích.<br>";
    }
} else {
    echo "Không có ảnh được tải lên hoặc có lỗi trong quá trình tải lên.<br>";
}

// Lấy thông tin từ form
$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';

// Thêm hoa mới vào mảng
$flowers[] = [
    "name" => $name,
    "description" => $description,
    "image" => $imagePath,
];

// Lưu lại danh sách hoa vào file flowers.php
file_put_contents('flowers.php', "<?php\n\$flowers = " . var_export($flowers, true) . ";\n?>");

echo "Hoa mới đã được thêm thành công!<br>";
echo "<a href='index.php'>Quay lại danh sách</a>";
?>