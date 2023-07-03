<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>User Authentication | Laravel Demo</title>
</head>

<body>
    <div class="container mt-5">
        <div class="jumbotron col-md-6">

            @if (Session::has('msg'))
                <div class="alert alert-danger" role="alert">
                    <span> <strong> Oops! </strong> {{ Session::get('msg') }} </span>
                </div>
            @endif

            <form name="" action="{{ Route('authentication.request') }}" method="post">
                @csrf
                @method('POST')
                <div class="m-3">
                    {{ 'Enter your registered email to get otp for Authentication.' }}
                </div>

                <div class="form-group col-md-6">
                    <label for="Email1">Email</label>
                    <input type="email" class="form-control" id="Email" name="email"
                        placeholder="enter your email..." required>
                    <span class="text-danger"> {{ $errors->first('email') }}
                </div>

                <div>
                    <button type="submit" class="btn btn-outline-primary mx-3">Send OTP</button>
                    <a class="btn btn-outline-warning" href="/dashboard"> Cancel </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
