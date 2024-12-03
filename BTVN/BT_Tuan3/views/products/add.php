<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="heading">Thêm sản phẩm mới</h1>
        <form action="index.php?action=store" method="POST" class="form">
            <div class="form-group">
                <label for="sanpham">Tên sản phẩm</label>
                <input type="text" id="sanpham" name="sanpham" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="gia">Giá sản phẩm (VND)</label>
                <input type="number" id="gia" name="gia" class="form-control" required>
            </div>
            <button type="submit" class="btn submit-btn">Lưu sản phẩm</button>
            <a href="index.php" class="btn cancel-btn">Hủy</a>
        </form>
    </div>
</body>
</html>