<!DOCTYPE html>
<html>
<head>
    <title>Sửa sản phẩm</title>
</head>
<body>
    <h1>Sửa sản phẩm</h1>
    <form method="POST" action="index.php?action=update&id=<?= $product['id'] ?>">
        <label>Tên sản phẩm:</label>
        <input type="text" name="sanpham" value="<?= $product['sanpham'] ?>" required>
        <br>
        <label>Giá:</label>
        <input type="text" name="gia" value="<?= $product['gia'] ?>" required>
        <br>
        <button type="submit">Cập nhật</button>
    </form>
</body>
</html>
