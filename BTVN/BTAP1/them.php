<?php
// Đảm bảo tệp products.json tồn tại, nếu không tạo nó
if (!file_exists('products.json')) {
    file_put_contents('products.json', json_encode([])); // Tạo tệp JSON rỗng nếu chưa có
}

// Đọc dữ liệu từ tệp JSON
$json_data = file_get_contents('products.json');
$employees = json_decode($json_data, true);  // Chuyển đổi dữ liệu JSON thành mảng

// Tìm ID cao nhất từ các sản phẩm hiện có
$maxId = 0;
if (count($employees) > 0) {
    $maxId = max(array_column($employees, 'id')); // Lấy ID lớn nhất
}

// Tính toán ID tiếp theo
$currentId = $maxId + 1;  // ID tiếp theo sẽ là ID lớn nhất + 1

// Xử lý khi người dùng thêm sản phẩm
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $gia = $_POST['gia'];

    // Kiểm tra thông tin
    if (!empty($name) && !empty($gia)) {
        $newProduct = [
            'id' => $currentId,  // Gán ID tự động
            'sanpham' => $name,
            'gia' => $gia
        ];
        $employees[] = $newProduct;  // Thêm sản phẩm vào mảng

        // Cập nhật lại tệp products.json
        file_put_contents('products.json', json_encode($employees, JSON_PRETTY_PRINT));

        // Chuyển hướng về trang danh sách sản phẩm
        header('Location: index.php');
        exit;
    } else {
        echo "Vui lòng nhập đầy đủ thông tin sản phẩm!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border-radius: 5px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h2 {
            color: #435d7d;
        }

        .btn-primary {
            background-color: #435d7d;
            border: none;
        }

        .btn-primary:hover {
            background-color: #324a63;
        }

        .btn-secondary {
            background-color: #e9ecef;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Thêm sản phẩm</h2>
        <form action="them.php" method="POST">
            <label for="name">Tên sản phẩm</label>
            <input type="text" name="name" id="name" class="form-control" required>
            <br>
            <label for="gia">Giá</label>
            <input type="text" name="gia" id="gia" class="form-control" required>
            <br>
            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
        </form>
        <br>
        <a href="index.php" class="btn btn-secondary">Quay lại danh sách sản phẩm</a>
    </div>
</body>

</html>