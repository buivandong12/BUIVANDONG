

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<?php include 'products.php' ?>
	<style>
		body {
			color: #566787;
			background: #f5f5f5;
			font-family: 'Varela Round', sans-serif;
			font-size: 13px;
		}

		.table-responsive {
			margin: 30px 0;
		}

		.table-wrapper {
			background: #fff;
			padding: 20px 25px;
			border-radius: 3px;
			min-width: 1000px;
			box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
		}

		.table-title {
			padding-bottom: 15px;
			background: #435d7d;
			color: #fff;
			padding: 16px 30px;
			min-width: 100%;
			margin: -20px -25px 10px;
			border-radius: 3px 3px 0 0;
		}

		.table-title h2 {
			margin: 5px 0 0;
			font-size: 24px;
		}

		.table-title .btn-group {
			float: right;
		}

		.table-title .btn {
			color: #fff;
			float: right;
			font-size: 13px;
			border: none;
			min-width: 50px;
			border-radius: 2px;
			border: none;
			outline: none !important;
			margin-left: 10px;
		}

		.table-title .btn i {
			float: left;
			font-size: 21px;
			margin-right: 5px;
		}

		.table-title .btn span {
			float: left;
			margin-top: 2px;
		}

		table.table td a:hover {
			color: #2196F3;
		}

		table.table td a.edit {
			color: #FFC107;
		}

		table.table td a.delete {
			color: #F44336;
		}

		table.table td i {
			font-size: 19px;
		}

		table.table .avatar {
			border-radius: 50%;
			vertical-align: middle;
			margin-right: 10px;
		}
	</style>

</head>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['name'];
	$gia = $_POST['gia'];

	if (!empty($name) && !empty($gia)) {
		$newProduct = [
			'id' => count($employees) + 1,
			'sanpham' => $name,
			'gia' => $gia
		];
		$employees[] = $newProduct;
		header('Location: index.php');
		exit;
	} else {
		echo "Vui lòng nhập đầy đủ thông tin sản phẩm!";
	}
}
?>

<body>
	<?php include 'header.php' ?>
	<div class="col-sm-6">
		<a href="them.php" class="btn btn-success" target="_blank"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
	</div>
	<main>
		<div class="h">
			<div class="container-xl">
				<div class="table-responsive">
					<div class="table-wrapper">
						<table class="table">
							<thead>
								<tr>
									<th>Sản Phẩm</th>
									<th>Giá Thành</th>
									<th>sửa</th>
									<th>xóa</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($employees as $employee): ?>
									<tr>
										<td><?= $employee['sanpham'] ?></td>
										<td><?= $employee['gia'] ?></td>
										<td>
											<a href="sua.php?id=<?= $employee['id'] ?>">
												<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
											</a>
										</td>

										<td>
											<a href="xoa.php?id=<?= $employee['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">
												<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
											</a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>

					</div>
				</div>
	</main>
	<?php include 'footer.php' ?>

</body>

</html>