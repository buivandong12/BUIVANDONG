<?php
include 'db.php';

// Lấy tất cả thông tin hoa từ CSDL
$stmt = $pdo->query("SELECT * FROM flowers");
$flowers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách hoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Danh sách hoa</h1>
        <a href="add.php" class="btn btn-primary mb-3">Thêm hoa mới</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên hoa</th>
                    <th>Mô tả</th>
                    <th>Ảnh</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($flowers as $flower) {
                    echo "<tr>";
                    echo "<td>{$flower['id']}</td>";
                    echo "<td>{$flower['name']}</td>";
                    echo "<td>{$flower['description']}</td>";
                    echo "<td><img src='{$flower['image']}' width='100'></td>";
                    echo "<td><a href='edit.php?id={$flower['id']}' class='btn btn-warning'>Sửa</a> 
                          <a href='delete.php?id={$flower['id']}' class='btn btn-danger'>Xóa</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
