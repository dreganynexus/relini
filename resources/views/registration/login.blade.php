<!-- resources/views/admin/login.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            margin-top: 100px;
        }

        .card {
            max-width: 400px;
            margin: 0 auto;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center login-container">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center bg-primary   text-white">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        @if (session('login'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('login') }}
                            </div>
                        @endif

                            @if (session('middleware'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('middleware') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ url('userlogin') }}">
                            @csrf

                            <div class="form-group">
                                <label for="username">Email:</label>
                                <input type="email"   class="form-control" name="email"
                                    placeholder="Ingiza email yako">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password"   class="form-control" name="password"
                                    placeholder="Ingiza nywira yako">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
