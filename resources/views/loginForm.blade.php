<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login Form</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <h2> Login Form </h2>
        <form action="user" method="post">
            @csrf
            <input type="email" placeholder="your email here..." name="email" /> <br/><br/>
            <input type="password" placeholder="your password here..." name="password" /><br/><br/>
            <input type="submit" value="Login" />
        </form>
    </body>
</html>
