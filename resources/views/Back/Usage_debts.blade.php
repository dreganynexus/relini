<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <title>Sold Stock Display</title>
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
        <a href="#" style="color:firebrick">{{auth()->user()->name}}</a>
        <a href="{{ url('logout') }}" style="color:firebrick">Logout</a>
    </div>

    <div class="container container-content">
        <br><br><br>
        <h2 class="text-center text-primary">Expenses</h2>
        @if (session('delete'))
            <p class="alert alert-danger alert-dismissible">{{ session('delete') }}</p>
        @endif
        <div class="data-table">
            <div class="table-responsive">
                <table class="table table-bordered">


                    <thead>
                        <tr>
                            {{-- <th>S/N</th> --}}
                            <th>Expenses</th>
                            {{-- <th>Stock Price</th> --}}
                            {{-- <th>Number of Stocks sold</th> --}}
                            {{-- <th>quantity sold</th> --}}
                            <th>Amount</th>
                            <th>Date entered</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <h3 style="color: red">{{ $sum }}/=</h3>
                    <hr>
                    <h4>Number of stock sold = <b style="color: red">{{ $count }}</b></h4>
                    <tbody>
                        @foreach ($usage as $usage)
                            <tr>
                                {{-- <td>{{ $usage->id }}</td> --}}
                                <td>{{ $usage->expenses }}</td>
                                <td>{{ $usage->amount }}</td>
                                {{-- <td>{{$usage->numberOfStocks}}</td> --}}
                                {{-- <td>{{$usage->quantity}}</td>
                        <td>{{$usage->amount}}</td> --}}
                                <td> {{ $usage->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ url('delete_usage/' . $usage->id) }}">
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
        <br><br>

        <h2 class="text-center text-primary">Outstanding</h2>
        @if (session('deletee'))
            <p class="alert alert-danger alert-dismissible">{{ session('deletee') }}</p>
        @endif

        @if (session('messages'))
            <p class="alert alert-success alert-dismissible">{{ session('messages') }}</p>
        @endif

        <div class="data-table">
            <div class="table-responsive">
                <table class="table table-bordered">


                    <thead>
                        <tr>
                            {{-- <th>S/N</th> --}}
                            <th>Name</th>
                            {{-- <th>Stock Price</th> --}}
                            {{-- <th>Number of Stocks sold</th> --}}
                            {{-- <th>quantity sold</th> --}}
                            <th>things</th>
                            <th>amount</th>
                            <th>Date Entered</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <h3 style="color: red">{{ $summ }}/=</h3>
                    <hr>
                    <h4>Number of stock sold = <b style="color: red">{{ $countt }}</b></h4>
                    <tbody>
                        @foreach ($debt as $debt)
                            <tr>
                                {{-- <td>{{ $debt->id }}</td> --}}
                                <td>{{ $debt->name }}</td>
                                <td>{{ $debt->things }}</td>
                                <td>{{ $debt->amount }}</td>
                                {{-- <td>{{$debt->numberOfStocks}}</td> --}}
                                {{-- <td>{{$debt->quantity}}</td>
                        <td>{{$debt->amount}}</td> --}}
                                <td> {{ $debt->created_at->format('d-m-Y') }}</td>
                                <td>
                                    {{-- <a href="{{ url('delete_debt/' . $debt->id) }}">
                                        <button class="btn btn-danger">Delete</button>
                                    </a> --}}
                                    <a href="{{ url('uncle/' . $debt->name) }}">
                                        <button type="button" class="btn btn-success">
                                            Details
                                        </button>
                                    </a>

                                </td>
                                {{-- <td>{{ $debt->created_at->format('d-m-Y') }}</td> --}}



                            </tr>
                        @endforeach
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>


    </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
