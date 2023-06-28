<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login Form</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    </head>
    <body>

        <div class="container">
            <div class="jumbotron">
                <h1 class="display-4 mx-3">Login Here</h1>
                    <hr />
                    <div class="col-md-6">
                        <form action="/login" method="post">
                            {{method_field('POST')}}
                            @csrf

                            <span class="text-danger">
                                @if(session('msg'))
                                    {{session('msg')}}
                                @endif
                            </span>

                            <div class="form-group">
                                <label for="Email1">Email <span style="color:red;">*</span> </label>
                                <input type="email" name="email" class="form-control" id="email_id"
                                value="{{ old('email') }}" placeholder="example@email.com" required>
                                    <span class="text-danger"> {{$errors->first('email')}} </span>
                            </div>
                            <div class="form-group">
                                <label for="Password1">Password <span style="color:red;">*</span> </label>
                                <input type="password" name="password" class="form-control" id="user_password_id"
                                    placeholder="Password" required>
                                    <span class="text-danger"> {{$errors->first('password')}} </span>
                            </div>
                            <div class="row">
                                <div class="row col-md-6 mx-1">
                                    <button type="submit" class="btn btn-outline-primary">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
