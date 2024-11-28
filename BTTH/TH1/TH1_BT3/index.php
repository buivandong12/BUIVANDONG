<?php
// Đọc dữ liệu từ file CSV
$filename = "students.csv";
$sinhvien = [];

// Kiểm tra file có tồn tại không
if (($handle = fopen($filename, "r")) !== FALSE) {
    // Đọc dòng tiêu đề và loại bỏ BOM
    $headers = fgetcsv($handle, 1000, ",");
    if ($headers) {
        $headers[0] = preg_replace('/^\xEF\xBB\xBF/', '', $headers[0]); // Loại bỏ BOM
        $headers = array_map('trim', $headers); // Xóa khoảng trắng thừa
    }

    // Kiểm tra dòng tiêu đề
    if (empty($headers) || !in_array("username", $headers)) {
        die("Dòng tiêu đề không hợp lệ hoặc thiếu cột 'username'.");
    }

    // Đọc từng dòng dữ liệu
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if (count($data) === count($headers)) {
            $sinhvien[] = array_combine($headers, $data);
        } else {
            error_log("Dòng dữ liệu không hợp lệ: " . implode(",", $data));
        }
    }
    fclose($handle);
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Danh sách sinh viên</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>tài khoản</th>
                    <th>mật khẩu</th>
                    <th>họ</th>
                    <th>tên</th>
                    <th>lớp</th>
                    <th>email</th>
                    <th>mã ngành</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($sinhvien)): ?>
                    <?php foreach ($sinhvien as $sv): ?>
                        <tr>
                            <td><?= htmlspecialchars($sv['username']) ?></td>
                            <td><?= htmlspecialchars($sv['password']) ?></td>
                            <td><?= htmlspecialchars($sv['lastname']) ?></td>
                            <td><?= htmlspecialchars($sv['firstname']) ?></td>
                            <td><?= htmlspecialchars($sv['city']) ?></td>
                            <td><?= htmlspecialchars($sv['email']) ?></td>
                            <td><?= htmlspecialchars($sv['course1']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Không có dữ liệu</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>