<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Stock Data Display</title>
 
</head>

<body>

    <!-- Left Navigation Menu -->
    <div class="left-nav fixed-top">
        {{-- <a href="{{url('/')}}" class="btn btn-dark btn-block">Nyumbani</a> --}}
        {{-- <a href="{{url('/mauzo')}}" class="btn btn-dark btn-block">Uza</a> --}}
        {{-- <a href="{{url('/ongeza-bidhaa')}}" class="btn btn-dark btn-block">Ongeza Bidhaa</a> --}}
        @yield('Mauzo')
        @yield('Nyumbani')
        @yield('usage_navigation')
    </div>

    <!-- Content Area -->
    <div class="content">
        <div class="container mt-5">
            {{-- <h2 class="text-center text-primary">Bidhaa Zilizopo</h2> --}}
            <div class="data-table">
                <div class="table-responsive">
                    @yield('Uploadstockk')
                    @yield('sold_stock')
                    @yield('admin_views')
                    @yield('logcome')
                    @yield('usage')
                    @yield('debt')
                    @yield('register')

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
