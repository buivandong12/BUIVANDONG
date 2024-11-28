<?php
// Đọc danh sách hoa từ file
include 'flowers.php';

// Lấy ID từ tham số GET
$id = $_GET['id'] ?? null;

// Kiểm tra ID hợp lệ và xóa hoa
if ($id !== null && isset($flowers[$id])) {
    unset($flowers[$id]);
    $flowers = array_values($flowers); // Đặt lại chỉ số mảng
    file_put_contents('flowers.php', "<?php\n\$flowers = " . var_export($flowers, true) . ";\n?>");
    echo "Đã xóa hoa thành công!";
} else {
    echo "Không tìm thấy hoa cần xóa!";
}

echo "<br><a href='index.php'>Quay lại danh sách</a>";
?>