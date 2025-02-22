<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Sold Stock Display</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            padding-top: 56px;
            /* Adjusted for fixed navbar */
        }

        /* .data-table {
            border: 2px solid #ff1e00;
            border-radius: 10px;
            margin-top: 20px;
        } */

        .data-table table {
            width: 100%;
        }

        .data-table th,
        .data-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .data-table th {
            background-color: #007bff;
            color: white;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #f8f9fa;
            padding: 10px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar a {
            padding: 8px 16px;
            text-decoration: none;
            display: block;
            color: #007bff;
            font-weight: bold;
        }

        .navbar a:hover {
            background-color: #007bff;
            color: white;
        }

        .container-content {
            margin-top: 80px;
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 10px;
            }

            .container-content {
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="navbar">
        <a href="{{ url('/getsaler') }}">Home</a>
        <a href="{{ url('sold_producti') }}">Sales</a>
        <a href="{{ url('admin_view') }}">Uploaded stock</a>
        <a href="{{ url('Verified') }}">Verified</a>
        <a href="{{ url('usage_debt') }}">Usage & Debts</a>
        <a href="{{ url('register') }}">Registration</a>
        <a href="#" style="color:firebrick">{{ auth()->user()->name }}</a>
        <a href="{{ url('logout') }}" style="color:firebrick">Logout</a>

    </div>

    <div class="container container-content"> <br><br><br>
        <h2 class="text-center text-primary">Sold Stock Display</h2>


        <div class="data-table">
            <div class="table-responsive">
                {{-- <button class="btn btn-secondary"><a href="{{ url('upload') }}" style="text-decoration:none;">Back</a></button><br> --}}
                @if (session('delete'))
                    <p class="alert alert-danger alert-dismissible">{{ session('delete') }}</p>
                @endif

                @if (session('ess'))
                    <p class="alert alert-success alert-dismissible">{{ session('ess') }}</p>
                @endif
                <h3 class="alert alert-info">No sales Uploaded today!!</h3>



            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
