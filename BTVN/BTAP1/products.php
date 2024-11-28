<?php
// Kiểm tra xem tệp products.json đã tồn tại chưa
if (file_exists('products.json')) {
    // Đọc nội dung tệp JSON
    $json_data = file_get_contents('products.json');
    
    // Chuyển đổi dữ liệu JSON thành mảng PHP
    $employees = json_decode($json_data, true); // true để trả về mảng thay vì đối tượng
} else {
    // Nếu tệp không tồn tại, khởi tạo mảng rỗng
    $employees = [];
}

// Cập nhật sản phẩm nếu có dữ liệu gửi từ form sửa sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy ID sản phẩm cần sửa từ form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gia = $_POST['gia'];

    // Tìm và sửa sản phẩm trong mảng
    foreach ($employees as &$employee) {
        if ($employee['id'] == $id) {
            $employee['sanpham'] = $name;
            $employee['gia'] = $gia;
            break;
        }
    }

    // Sau khi sửa, ghi lại mảng vào tệp JSON
    file_put_contents('products.json', json_encode($employees, JSON_PRETTY_PRINT));
}
?>