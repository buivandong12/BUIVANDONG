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
        <form action="{{ route('Issue.update', $Issue->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method ('PUT')
            <div class="mb-3 form-group">
                <label for="name" class="form-label">Name</label>
                <select class="form-control @error('name') is-invalid @enderror" name="computer_id" id="id">
                    <option value="">Computer Name</option>
                    @foreach ($Computer as $item)
                    <option value="{{ $item->id }}" {{ $Issue->Computer->computer_name == $item->computer_name ? 'selected' : '' }}>
                        {{ $item->computer_name }}
                    </option>
                    @endforeach
                </select>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <label for="quantity" class="form-label">Reporter_by</label>
                <input class="form-control @error('quantity') is-invalid @enderror" type="text" name="reporter_by" id="reporter_by" value="{{ old('reporter_by' , $Issue->reporter_by) }}">
                @error('reporter_by')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <label for="date" class="form-label">Reporter_date</label>
                <input class="form-control @error('date') is-invalid @enderror" type="datetime-local" name="reporter_date" id="reporter_date" value="{{ old('reporter_date',$Issue->reporter_date) }}">
                @error('reporter_date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <label for="phone" class="form-label">description</label>
                <input class="form-control @error('phone') is-invalid @enderror" type="text" name="description" id="description" value="{{ old('description', $Issue->description) }}">
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <label for="quantity" class="form-label">Urgency</label>
                <input class="form-control @error('quantity') is-invalid @enderror" type="text" name="urgency" id="urgency" value="{{ old('urgency',$Issue->urgency) }}">
                @error('urgency')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <label for="quantity" class="form-label">Status</label>
                <input class="form-control @error('quantity') is-invalid @enderror" type="text" name="status" id="status" value="{{ old('status', $Issue->status) }}">
                @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>



            <button type="submit" class="btn btn-primary">ADD</button>
        </form>


        </body>

        </html>


    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>