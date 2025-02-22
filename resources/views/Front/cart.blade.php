<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2 style="text-align: center; color: firebrick;">Bidhaa unazotaka kuziua</h2>
        <div class="back"><a href="{{ url('getsaler') }}"><button class="btn btn-secondary">Nyuma</button></a></div>
        <br>
        <table class="table table-bordered">
            <h4>Jumla= <span style="color:red">{{ $sum }}/=</span>
                <h4>Idadi ya bidhaa= <span style="color:darkgreen">{{ $total }}/=</span>
                </h4>
                </h4>
                @if (session('error'))
                    <p class="alert alert-danger">{{ session('error') }}</p>
                @endif
                @if (session('delete'))
                    <p class="alert alert-danger">{{ session('delete') }}</p>
                @endif
                @if (session('success'))
                    <p class="alert alert-success">{{ session('success') }}</p>
                @endif
                <div class="text text-danger" role="alert">
                    Hakiki taarifa zako kabla hujazitumaa!!!!!
                </div>
                <thead>
                    <tr>
                        <th scope="col">S/N</th>
                        <th scope="col">Jina </th>
                        <th scope="col">Idadi</th>
                        <th scope="col">Gharama</th>
                        <th scope="col">Hatua</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $cartItem)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $cartItem->stockName }}</td>
                            <td>{{ $cartItem->quantity }}</td>
                            <td>{{ $cartItem->amount }}</td>
                            <td>
                                <a href="{{ url('delete_cart/' . $cartItem->id) }}">
                                    <button class="btn btn-danger">Delete</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
        <a href="{{url('buy')}}"><button id="buyButton" class="btn btn-primary" onclick="disableButton()">Tuma</button></a>
    </div>

    <script>
        function disableButton() {
            var buyButton = document.getElementById("buyButton");
            buyButton.disabled = true;
            buyButton.innerText = "Processing..."; // Optional: Change button text
            // You can add more code here, like form submission or AJAX requests
        }
    </script>
</body>

</html>
