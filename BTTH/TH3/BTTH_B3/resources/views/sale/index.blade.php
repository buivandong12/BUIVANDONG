<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Table with Add and Delete Row Feature</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            color: #404E67;
            background: #F5F7FA;
            font-family: 'Open Sans', sans-serif;
        }

        .table-wrapper {
            width: 700px;
            margin: 30px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
        }

        .table-title h2 {
            margin: 6px 0 0;
            font-size: 22px;
        }

        .table-title .add-new {
            float: right;
            height: 30px;
            font-weight: bold;
            font-size: 12px;
            text-shadow: none;
            min-width: 100px;
            border-radius: 50px;
            line-height: 13px;
        }

        .table-title .add-new i {
            margin-right: 4px;
        }

        table.table {
            table-layout: fixed;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table th:last-child {
            width: 100px;
        }

        table.table td a {
            cursor: pointer;
            display: inline-block;
            margin: 0 5px;
            min-width: 24px;
        }

        table.table td a.add {
            color: #27C46B;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #E34724;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table td a.add i {
            font-size: 24px;
            margin-right: -1px;
            position: relative;
            top: 3px;
        }

        table.table .form-control {
            height: 32px;
            line-height: 32px;
            box-shadow: none;
            border-radius: 2px;
        }

        table.table .form-control.error {
            border-color: #f50000;
        }

        table.table td .add {
            display: none;
        }

        .btn-close {
            background-color: transparent;
            border: none;
            font-size: 18px;
            color: #000;
        }

        .btn-close:hover {
            color: red;
        }

        .btn-close:focus {
            outline: none;
            box-shadow: none;
        }

        .table td a.edit,
        .table td form {
            display: inline-block;
            /* Giúp các phần tử nằm cạnh nhau */
            margin-right: 5px;
            /* Khoảng cách giữa nút Sửa và Xóa */
        }

        .table td form button.delete {
            background-color: #E34724;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .table td form button.delete:hover {
            background-color: #c63c20;
        }

        .table td a.edit button {
            background-color: #FFC107;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .table td a.edit button:hover {
            background-color: #e0a800;
        }
    </style>
</head>

<body>
    <div class="container-lg">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>CRUD</h2>
                        </div>
                        <div class="col-sm-4">
                            <a href="{{ route('sale.create') }}"><button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button></a>
                        </div>
                    </div>
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif


                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tên thuốc</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Ngày bán</th>
                            <th>Số điện thoại khách hàng</th>
                            <th>Chức năng</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->medicine->name }}</td> <!-- Tên thuốc -->
                            <td>{{ number_format($item->medicine->price, 2) }} VND</td> <!-- Giá (định dạng tiền tệ) -->
                            <td>{{ $item->quantity }}</td> <!-- Số lượng -->
                            <td>{{ date('d/m/Y H:i', strtotime($item->sale_date)) }}</td> <!-- Ngày bán (định dạng ngày) -->
                            <td>{{ $item->customer_phone ?? 'N/A' }}</td> <!-- Số điện thoại khách hàng -->
                            <td>
                                <a href="{{ route('sale.edit', $item->sale_id) }}" class="edit" title="Edit">
                                    <button type="button">Edit</button>
                                </a>
                                <form action="{{ route('sale.destroy', $item->sale_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="delete" type="submit">Delete</button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>