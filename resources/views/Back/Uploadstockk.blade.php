@extends('Master.Master')
@section('Mauzo')
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">@auth
            {{auth()->user()->name}}
        @endauth</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Nyumbani</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/getsaler') }}">Uza</a>
                </li>
                    @if ($count > 0)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/cart') }}">Oda <span style="color: red">({{ $count }})</span></a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/Uploadstockk') }}">Ongeza Bidhaa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/usage') }}">Matumizi & Madeni</a>
                </li>
                                @if (auth()->user()->role==='admin')
                 <li class="nav-item">
                    <a class="nav-link" href="{{ url('/register') }}">Admin</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/logout') }}" style="color: firebrick">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

  {{-- <a href="{{url('sold_product')}}" class="btn btn-dark btn-block">Mauzo</a> --}}
@endsection
@section('Uploadstockk')
<div class="container mt-5">
  {{-- <h2 class="text-center text-primary">Admin Upload</h2> --}}
  <div class="form-frame">
    <form action="{{url('uploadstock')}}" method="POST">
        @csrf

    <h3 style="text-align: center" >Ongeza bidhaa mpya</h3>
                 @if (session('sucess'))
             <p class="alert alert-success alert-dismissible">{{session('sucess')}}</p>

             @endif

      <div class="form-group">
        <label for="stockName" class="text-white">Stock Name:</label>
        <input type="text" class="form-control" id="stockName" name="stockName" placeholder="Jina la bidhaa" required>
      </div>
      <div class="form-group">
        <label for="numberOfStocks" class="text-white">Number of Stocks:</label>
        <input type="number" class="form-control" id="numberOfStocks" name="numberOfStocks" placeholder="Idadi ya bidhaa" required>
      </div>
      <div class="form-group">
        <label for="stockPrice" class="text-white">Stock Price:</label>
        <input type="number" class="form-control" id="stockPrice" name="stockPrice" placeholder="Gharama ya bidhaa" required>
      </div>
      <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Ongeza bidhaa!">Ongeza</button>
    </form>
  </div>
</div>
@endsection
