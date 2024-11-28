<?php
// Đọc dữ liệu từ file JSON
if (file_exists('products.json')) {
    $json_data = file_get_contents('products.json');
    $employees = json_decode($json_data, true); // true để trả về mảng
} else {
    $employees = [];
}

// Kiểm tra nếu tham số id được truyền qua URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    // Kiểm tra nếu sản phẩm với id này tồn tại
    $employeeToEdit = null;
    foreach ($employees as $employee) {
        if ($employee['id'] == $id) {
            $employeeToEdit = $employee;
            break;
        }
    }

    if (!$employeeToEdit) {
        echo "Không tìm thấy sản phẩm!";
        exit;
    }
} else {
    echo "ID không hợp lệ!";
    exit;
}

// Xử lý khi người dùng sửa sản phẩm
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $gia = $_POST['gia'];

    if (!empty($name) && !empty($gia)) {
        // Cập nhật sản phẩm
        foreach ($employees as $index => $employee) {
            if ($employee['id'] == $id) {
                $employees[$index]['sanpham'] = $name;
                $employees[$index]['gia'] = $gia;
                break;
            }
        }

        // Ghi lại vào file JSON sau khi sửa
        file_put_contents('products.json', json_encode($employees, JSON_PRETTY_PRINT));
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        /* Các style của bạn */
    </style>
</head>

<body>
    <div class="container">
        <h2>Sửa sản phẩm</h2>
        <?php if ($employeeToEdit): ?>
            <form method="POST">
                <div class="form-group">
                    <label for="name">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $employeeToEdit['sanpham'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="gia">Giá sản phẩm</label>
                    <input type="text" class="form-control" id="gia" name="gia" value="<?= $employeeToEdit['gia'] ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            </form>
        <?php endif; ?>
    </div>
</body>

</html>