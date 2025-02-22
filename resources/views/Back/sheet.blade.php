<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Sold Stock Display</title>
    <style>
        body {
           font-family: Arial, sans-serif;
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
            .header {
        text-align: center;
        margin-bottom: 20px;
        color: blue;
    }

    /* Responsive Styles */
    @media only screen and (max-width: 600px) {
        .container {
            padding: 10px;
        }
        .header h2 {
            font-size: 24px;
        }
        .invoice-table th,
        .invoice-table td {
            padding: 6px;
        }
    }
            .invoice-table {
        width: 100%;
        border-collapse: collapse;
    }
        .invoice-table th,
    .invoice-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    .invoice-table th {
        background-color: #f2f2f2;
    }
        .details {
        margin-bottom: 20px;
    }
        .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
    }
    </style>
</head>

<body>

    {{-- <div class="navbar">
    <a href="{{ url('/') }}">Home</a>
    <a href="{{ url('sold_producti') }}">Sales</a>
    <a href="{{ url('admin_view') }}">Uploaded stock</a>
    <a href="{{ url('Verified') }}">Verified</a>
    <a href="{{ url('usage_debt') }}">Usage & Debts</a>


</div> --}}

        <h3 class="header">

        <img src="reliniLogo.png" alt="" style="height: 200px;width:200px;align-items:center;text-align:center;justify-content:center">

        </h3>

    <div class="container">
        <h3  >Gharama za Vinywaji</h3>

        {{-- <div class="data-table"> --}}
            <div class="details">
                {{-- <button class="btn btn-secondary"><a href="{{ url('upload') }}" style="text-decoration:none;">Back</a></button><br> --}}
                @if (session('delete'))
                    <p class="alert alert-danger alert-dismissible">{{ session('delete') }}</p>
                @endif

                @if (session('ess'))
                    <p class="alert alert-success alert-dismissible">{{ session('ess') }}</p>
                @endif


                {{-- <div style="margin-top: 10px;">
        <a href="{{url('sold_producti_pdf')}}" class="btn btn-primary">Download PDF</a>
    </div> --}}
                {{-- <h4><strong>Sales = </strong><span style="color: blue;">{{ $sum }}/=</span></h4>

                <h4><strong>Debt = </strong><span  style="color: blue;"> {{ $sumFromFirstDate }}/=</span></h4>
                <h4><strong>Expenses = </strong><span style="color: blue;"> {{ $sumUsageFromFirstDate }}/=</span></h4>
                <h4><strong>Lipa Namba = </strong><span style="color: blue;"> {{ $sumlipanamba }}/=</span></h4>
                <h4><strong>Cash on Hand = </strong><span style="color: green;">
                        {{ $sum - ($sumFromFirstDate + $sumUsageFromFirstDate) }}/=</span></h4> --}}
                <hr>
                {{-- <h4>Number of stock sold = <b>{{ $count }}</b></h4> --}}

                <table class="invoice-table">


                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Jina la bidhaa</th>
                            <th>Bei ya bidhaa</th>
                            {{-- <th>Number of Stocks sold</th> --}}
                            {{-- <th>quantity sold</th> --}}
                            {{-- <th>Amount</th> --}}
                            {{-- <th>Date entered</th> --}}
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $counter=1;
                        @endphp
                        @foreach ($get as $get)
                            <tr>
                                <td>{{$counter++}}</td>
                                <td>{{ $get->stockName }}</td>
                                <td>{{   $get->stockPrice }}/=</td>
                                {{-- <td>{{$get->numberOfStocks}}</td> --}}
                                {{-- <td>{{ $get->quantity }}</td> --}}
                                {{-- <td>{{ $get->amount }}</td> --}}
                                {{-- <td> {{ $get->created_at->format('d-m-Y') }}</td> --}}
                                {{-- <td>
                            <a href="{{ url('delete_product/'.$product->id) }}">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td> --}}
                            </tr>
                        @endforeach
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
                {{-- oustanding --}}

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
