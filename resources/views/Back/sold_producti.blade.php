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

        .data-table {
            border: 2px solid #ff1e00;
            border-radius: 10px;
            margin-top: 20px;
        }

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

                {{-- senddata and verify --}}

                <form method="post" action="{{ url('moveAndDeleteData') }} ">
                    @csrf
                    @method('post')

                    <button type="submit" class="btn btn-success" style="float: right">Verify and Save Data</button>
                </form>


                <div style="margin-top: 10px;">
                    <a href="{{ url('sold_producti_pdf') }}" class="btn btn-primary"><span
                            class="bi bi-printer"></span>Download PDF</a>

                </div>

                <table class="table table-bordered">


                    <thead>
                        <tr>
                            {{-- <th>S/N</th> --}}
                            <th>Name of stock sold</th>
                            <th>Stock Price</th>
                            {{-- <th>Number of Stocks sold</th> --}}
                            <th>quantity sold</th>
                            <th>Amount</th>
                            <th>Date entered</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <h4>Sales = <span style="color: #ff1e00;">{{ $sum }}/=</span></h4>

                    <h4>Debt = <span style="color: #ff1e00;"> {{ $sumFromFirstDate }}/=</span></h4>
                    <h4>Expenses = <span style="color: #ff1e00;"> {{ $sumUsageFromFirstDate }}/=</span></h4>
                    <h4>Lipa Namba = <span style="color: #ff1e00;"> {{ $sumlipanamba }}/=</span></h4>
                    <h4>Cash on Hand = <span style="color: green;">
                            {{ $sum - ($sumFromFirstDate + $sumUsageFromFirstDate) }}/=</span></h4>
                    <hr>

                    <h4>Number of stock sold = <b>{{ $count }}</b></h4>

                    <tbody>

                        @foreach ($product as $product)
                            <tr>
                                {{-- <td>{{ $product->id }}</td> --}}
                                <td>{{ $product->stockName }}</td>
                                <td>{{ $product->stockPrice }}</td>
                                {{-- <td>{{$product->numberOfStocks}}</td> --}}
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->amount }}</td>
                                <td> {{ $product->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ url('delete_product/' . $product->id) }}">
                                        <button class="btn btn-danger">Delete</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>

            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
