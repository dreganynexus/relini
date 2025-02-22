<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome </title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Custom styles for the title */
        .system-title {
            color: #007bff;
            /* Blue color */
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>

</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="jumbotron text-center">

            <h1 class="display-4 system-title">Welcome to RELINI PARK STOCK MANAGEMENT SYSTEM</h1>
            {{-- Total Income from <b>10-01-2024</b> --}}
            <p>Total Income from: <b> {{ $product ? $product->toDateString() : 'No product sold' }}</b></p>
            {{-- <p>Current date : <b> {{ now()->toDateString() }}</b></p> --}}
            <h2 style="color:firebrick;">{{ $sum }}/=</h2>
            {{-- <p class="lead">Choose your role:</p> --}}
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <a href="{{ url('loginpage') }}" class="btn btn-primary btn-lg btn-block mb-2">Login</a>
                </div>
                <div class="col-md-12">
                    <a href="tel:+255710162828" class="btn btn-info btn-lg btn-block mb-2">
                        <i class="fas fa-phone"></i> Help
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
