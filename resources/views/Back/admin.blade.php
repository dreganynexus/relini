<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <title>Admin Upload</title>
  <style>
    .form-frame {
      border: 2px solid #ff1e00;
      padding: 20px;
      border-radius: 10px;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <h2 class="text-center text-primary">Admin Update</h2>
  <div class="form-frame">
    <form action="{{url('update_stock/'.$come->id)}}" method="POST">
        
                    {{  csrf_field() }}
            {{ method_field('PATCH') }}

             @if (session('update'))
             <p class="alert alert-success alert-dismissible">{{session('update')}}</p>
             @endif
                                {{-- @if (session('update'))
             <p class="alert alert-success alert-dismissible">{{session('update')}}</p>
             @endif --}}
          <button class="btn btn-secondary"> <a href="{{url('admin_view')}}" style="text-decoration:none;">Back</a></button>
      <div class="form-group">
        <label for="stockName" class="text-white">Stock Name:</label>
        <input type="text" class="form-control" id="stockName" name="stockName" placeholder="Enter stock name" value="{{$come->stockName}}">
      </div>
      <div class="form-group">
        <label for="numberOfStocks" class="text-white">Number of Stocks:</label>
        <input type="number" class="form-control" id="numberOfStocks" name="numberOfStocks" placeholder="Enter number of stocks" value="{{$come->numberOfStocks}}">
      </div>
      <div class="form-group">
        <label for="stockPrice" class="text-white">Stock Price:</label>
        <input type="number" class="form-control" id="stockPrice" name="stockPrice" placeholder="Enter stock price" value="{{$come->stockPrice}}">
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
