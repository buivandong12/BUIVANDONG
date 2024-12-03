<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sản phẩm</title>
</head>
<body>
    <h1>Danh sách sản phẩm</h1>
    <a href="index.php?action=add">Thêm sản phẩm</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Sản phẩm</th>
            <th>Giá</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $product['id'] ?></td>
                <td><?= $product['sanpham'] ?></td>
                <td><?= $product['gia'] ?></td>
                <td>
                    <a href="index.php?action=edit&id=<?= $product['id'] ?>">Sửa</a>
                    <a href="index.php?action=delete&id=<?= $product['id'] ?>" onclick="return confirm('Xóa sản phẩm?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>