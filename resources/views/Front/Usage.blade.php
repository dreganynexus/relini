@extends('Master.Master')
@section('usage_navigation')
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
@endsection

@section('usage')
<div class="form-frame">
    <form action="{{url('usage_post')}}" method="POST">
        @csrf

    <h3 style="text-align: center" >Matumizi</h3>
                 @if (session('success'))
             <p class="alert alert-success alert-dismissible">{{session('success')}}</p>

             @endif

      {{-- <div class="form-group">
        <label for="date" class="text-white">Tarehe:</label>
        <input type="datetime-local" class="form-control" id="date" name="date" placeholder="Tarehe" required>
      </div> --}}
      <div class="form-group">
        <label for="Expenses" class="text-white">Matumizi:</label>

        <input type="text" class="form-control" id="Expenses" name="expenses" placeholder="Maelezo ya matumizi" required>
      </div>
      <div class="form-group">
        <label for="amount" class="text-white">Gharama:</label>
        <input type="number" class="form-control" id="amount" name="amount" placeholder="Gharama  " required>
      </div>
      <button type="submit"  class="btn btn-primary">Tuma Matumizi</button><hr style="background-color: blue; size:inherit;">
    </form>
  </div>
@endsection


@section('debt')
<div class="form-frame"><br>
    <form action="{{url('debt')}}" method="POST">
        @csrf

    <h3 style="text-align: center" >Madeni</h3>
                 @if (session('successs'))
             <p class="alert alert-success alert-dismissible">{{session('successs')}}</p>

             @endif

      {{-- <div class="form-group">
        <label for="date" class="text-white">Tarehe:</label>
        <input type="datetime-local" class="form-control" id="date" name="date" placeholder="Tarehe" required>
      </div> --}}
      <div class="form-group">
        <label for="Expenses" class="text-white">Madeni:</label>

        <input type="text" class="form-control" id="name" name="name" placeholder="Jina la mdaiwa" required>
      </div>
              <label for="Expenses" class="text-white">things:</label>

        <input type="text" class="form-control" id="things" name="things" placeholder="vitu anavyodaiwa" required>
      </div>

      <div class="form-group">
        <label for="amount" class="text-white">Gharama:</label>
        <input type="number" class="form-control" id="amount" name="amount" placeholder="Gharama  " required>
      </div>
      <button type="submit" class="btn btn-primary">Tuma Madeni </button>
    </form>
  </div>
@endsection
