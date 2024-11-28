<?php
// Kiểm tra xem tệp products.json có tồn tại và có dữ liệu không
if (file_exists('products.json')) {
    // Đọc nội dung tệp JSON
    $json_data = file_get_contents('products.json');
    
    // Chuyển đổi dữ liệu JSON thành mảng PHP
    $employees = json_decode($json_data, true); // true để trả về mảng thay vì đối tượng
} else {
    // Nếu tệp không tồn tại hoặc không có dữ liệu, khởi tạo mảng rỗng
    $employees = [];
}

// Kiểm tra xem 'id' có tồn tại trong URL hay không
if (isset($_GET['id'])) {
    $id = $_GET['id']; // Lấy id từ URL

    // Tìm và xóa sản phẩm theo ID
    foreach ($employees as $key => $employee) {
        if ($employee['id'] == $id) {
            // Xóa sản phẩm trong mảng
            unset($employees[$key]);

            // Chuyển lại mảng thành JSON và lưu vào tệp
            if (file_put_contents('products.json', json_encode(array_values($employees), JSON_PRETTY_PRINT))) {
                // Nếu xóa thành công, chuyển hướng về trang danh sách
                header('Location: index.php');
                exit;
            } else {
                echo "Lỗi khi lưu tệp JSON sau khi xóa!";
                exit;
            }
        }
    }

    // Nếu không tìm thấy sản phẩm
    echo "Không tìm thấy sản phẩm với ID: $id!";
    exit;
} else {
    // Nếu không có ID trong URL
    echo "ID sản phẩm không hợp lệ!";
    exit;
}
?>