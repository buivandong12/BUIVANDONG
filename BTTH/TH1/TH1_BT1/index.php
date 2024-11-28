<?php include 'flowers.php' ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách các loài hoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <!-- Thanh điều hướng -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <div class="container-fluid">
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <!-- Menu Khách -->
                        <li class="nav-item">
                            <a class="nav-link active" href="?mode=guest">Người dùng khách</a>
                        </li>
                        <!-- Menu Quản lý -->
                        <li class="nav-item">
                            <a class="nav-link" href="?mode=admin">Quản lý</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php
        // Kiểm tra chế độ (Khách hoặc Quản lý)
        $mode = isset($_GET['mode']) ? $_GET['mode'] : 'guest';

        if ($mode == 'guest') {
            // Chế độ khách: Hiển thị danh sách hoa
            echo '<h1 class="text-center">Danh sách các loài hoa</h1>';
            echo '<div class="row">';
            foreach ($flowers as $flower) {
                echo '<div class="col-md-4">';
                echo '<div class="card mb-4">';
                echo '<img src="' . $flower['image'] . '" class="card-img-top" alt="' . $flower['name'] . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $flower['name'] . '</h5>';
                echo '<p class="card-text">' . $flower['description'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        } elseif ($mode == 'admin') {
            // Chế độ quản lý: Hiển thị bảng quản lý hoa
            echo '<h2 class="text-center">Quản lý danh sách hoa</h2>';
            echo '<div class="text-end mb-3">';
            echo '<a href="add.php" class="btn btn-success">Thêm mới</a>';
            echo '</div>';
            echo '<table class="table table-bordered">';
            echo '<thead class="table-dark">';
            echo '<tr>';
            echo '<th>#</th>';
            echo '<th>Tên hoa</th>';
            echo '<th>Mô tả</th>';
            echo '<th>Ảnh</th>';
            echo '<th>Hành động</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($flowers as $index => $flower) {
                echo '<tr>';
                echo '<td>' . ($index + 1) . '</td>';
                echo '<td>' . $flower['name'] . '</td>';
                echo '<td>' . $flower['description'] . '</td>';
                echo '<td><img src="' . $flower['image'] . '" alt="' . $flower['name'] . '" style="width: 100px;"></td>';
                echo '<td>';
                echo '<a href="edit.php?id=' . $index . '" class="btn btn-warning btn-sm">Sửa</a>';
                echo '<a href="delete.php?id=' . $index . '" class="btn btn-danger btn-sm">Xóa</a>';
                echo '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        }
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>