<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title> User Authentication | Laravel Demo</title>
</head>

<body>
    <div class="container mt-5">
        <div class="jumbotron">

            <div class="col-md-9">
                <h2> Password Verification </h2>
                {{ 'Enter your password for Authentication.' }}
                <hr>
            </div>

            <form class="form-inline col-md-6" action="{{ Route('authentication.password') }}" method="post">
                @csrf
                @method('POST')
                <div class="form-group mb-2">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" readonly class="form-control-plaintext" id="email" name="email"
                        value="{{ $email }}">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="password" class="sr-only">Password </label>
                    <input type="text" class="form-control" id="password" name="password"
                        placeholder="enter password">
                    <span class="text-danger mx-2"> {{ $errors->first('password') }} </span>
                    <span class="text-danger mx-2"> {{ $msg }} </span>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
