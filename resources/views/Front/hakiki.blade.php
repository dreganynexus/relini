<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Data Display</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <style>
        .data-table {
            border: 2px solid #007bff;
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
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">@auth
                {{ auth()->user()->name }}
            @endauth
        </a>

    </nav>

    <!-- Content Area -->
    <div class="container mt-5">
        <h2 class="text-center text-primary">Bidhaa Zilizopo</h2>
        <div class="data-table">
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            {{-- <th>S/N</th> --}}
                            <th>Jina la bidhaa</th>
                             <th>Bei ya Bidhaa</th>
                            <th>Bidhaa zilizopo</th>
                            <th>Bidhaa unazonunua</th>
                            <!--<th>Hatua</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($get as $stock)
                            <tr>
                                {{-- <td>{{ $stock->id }}</td> --}}
                                <td>{{ $stock->stockName }}</td>
                                 <td>{{ $stock->stockPrice }}</td>
                                <td>{{ $stock->numberOfStocks }}</td>

                                <!--<td>-->
                                <!--    <button class="btn btn-success">Uza</button>-->
                                <!--    </form>-->
                                <!--</td>-->
                            </tr>
                        @endforeach
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap and jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
