<!DOCTYPE html>
<html>

<head>
    <title>Account Authentication OTP</title>
</head>

<body>
    <p> <strong> Hello {{ $mailData['user'] }}, </strong> </p>     <br />
    <p> You are receiving this email because we received an authentication request for your account. </p>     <br />
    <p> <strong> {{ $mailData['body'] }} </strong> </p>     <br />
    <p> {{ 'Thank you for using our application.' }} </p>   
</body>

</html>
