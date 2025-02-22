<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
        <a href="#" style="color:firebrick">{{ auth()->user()->name }}</a>
        <a href="{{ url('logout') }}" style="color:firebrick">Logout</a>


    </div>
    <br>
    <div class="container container-content">
        <br><br>
        <div class="row">
            {{-- <h2 style="text-align: center; color:#007bff">Registration details</h2> --}}

            <div class="col-sm-6" style="background-color:lavender;">
                <div class="container">
                    <h3>Register Form</h3>
                    @if (session('create'))
                        <p class="text text-success">{{ session('create') }}</p>
                    @endif
                    <form action="{{ url('createregister') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Name:</label>
                            <input type="text" class="form-control" id="email" placeholder="Enter name"
                                name="name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">

                            <label for="email">Email:</label>
                            <input type="text" class="form-control" id="email" placeholder="Enter email"
                                name="email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="form-group">

                            <label for="email">Area live:</label>
                            <input type="text" class="form-control" id="email"
                                placeholder="Enter area where lives" name="area">
                            @error('area')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">

                            <label for="email">Phone number:</label>
                            <input type="number" class="form-control" id="email" placeholder="Enter phone number"
                                name="phoneNumber">
                            @error('phoneNumber')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">

                            <label for="pwd">Role:</label>
                            <select name="role" id="role" class="form-control">
                                <option value="client">Client</option>
                                <option value="admin">Admin</option>
                            </select>
                            @error('role')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">

                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd" placeholder="Enter password"
                                name="password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>

            </div>
            <br><br>
            <div class="col-sm-6" style="background-color:lavenderblush;">


                <div class="container">
                    <h3>Registered Users</h3>

                    @if (session('delete'))
                        <p class="text text-success">{{ session('delete') }}</p>
                    @endif
                    <table class="table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($get as $get)
                                <tr>
                                    <td>{{ $get->name }}</td>
                                    <td>{{ $get->role }}</td>
                                    <td> <button class="btn btn-info" data-toggle="modal"
                                            data-target="#profile">Profile</button>




                                    </td>
                                    <td><a href="{{ url('deleteuser/' . $get->id) }}"><button
                                                class="btn btn-danger">Delete</button></a></td>
                                </tr>
                            @endforeach



                            <!-- The Modal -->
                            <div class="modal" id="profile">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            {{-- <h4 class="modal-title"> {{ $get->name }} Profile</h4> --}}
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>




                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <p>Name: {{ $get->name }}</p>
                                            <p>Email: {{ $get->email }}</p>
                                            <p>Area lives: {{ $get->area }}</p>
                                            {{-- <p>Role:{{$get->role}}</p> --}}
                                            <p>Phone number: {{ $get->PhoneNumber }}</p>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>





                        </tbody>
                    </table>
                </div>



            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
