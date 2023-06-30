<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title> Authenticate User | Laravel Demo</title>
</head>

<body>
    <div class="container mt-5">
        <div class="jumbotron">

            @if (\Session::has('msg'))
                <div class="alert alert-danger" role="alert">
                    <span> <strong> Oops! </strong> {{ \Session::get('msg') }} </span>
                </div>
            @endif
            <form class="form-inline">
                <div class="form-group mb-2">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" readonly class="form-control-plaintext" id="email"
                        value="{{email}}">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="otp" class="sr-only">OTP: </label>
                    <input type="text" class="form-control" id="otp" placeholder="enter otp">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Verify OTP</button>
            </form>
        </div>
    </div>
</body>

</html>
