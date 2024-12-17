<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
            padding: 30px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            color: #212529;
        }

        .form-group label {
            font-weight: bold;
            color: #495057;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="form-title">EDIT</h2>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Chỉnh sửa thông tin bán hàng</title>
        </head>

        <body>
            <form action="{{ route('sale.update', $sale->sale_id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Trường Tên Thuốc -->
                <div class="mb-3 form-group">
                    <label for="name" class="form-label">Name</label>
                    <select class="form-control @error('name') is-invalid @enderror" name="name" id="name">
                        <option value="">-- Name --</option>
                        @foreach ($medicines as $item)
                        <option value="{{ $item->name }}" {{ $sale->medicine->name == $item->name ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Trường Số Lượng -->
                <div class="mb-3 form-group">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input class="form-control @error('quantity') is-invalid @enderror" type="text" name="quantity" id="quantity" value="{{ old('quantity', $sale->quantity) }}">
                    @error('quantity')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Trường Ngày bán -->
                <div class="mb-3 form-group">
                    <label for="date" class="form-label">Date</label>
                    <input class="form-control @error('date') is-invalid @enderror" type="datetime-local" name="date" id="date" value="{{ old('date', date('Y-m-d\TH:i', strtotime($sale->sale_date))) }}">
                    @error('date')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Trường Số điện thoại -->
                <div class="mb-3 form-group">
                    <label for="phone" class="form-label">Phone</label>
                    <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" id="phone" value="{{ old('phone', $sale->customer_phone) }}">
                    @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">UPDATE</button>
            </form>

        </body>

        </html>


    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>