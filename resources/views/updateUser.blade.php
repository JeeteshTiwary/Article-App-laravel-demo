<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Update User | Laravel Demo</title>
</head>
    <body>
        <div class="container">
            <div class="">
                <h1 class="display-4 mx-3">Update User Records</h1>
                <hr>
                <form name="SignupForm" action="/update/{{$user['id']}}" method="post">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$user['name']}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Email1">Email address</label>
                        <input type="email" class="form-control" id="Email" name="email" value="{{$user['email']}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">Phone Number:</label>
                        <input type="tel" class="form-control" id="phone" name="phone_number" value="{{$user['phone_number']}}" required>
                    </div>
                    <div class="form-group form-check mx-3">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <div>
                            <button type="submit" class="btn btn-outline-primary mx-3">Update</button>
                            <a class="btn btn-outline-danger" href="/userlist"> Back </a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>