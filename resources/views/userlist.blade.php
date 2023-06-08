<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>user list</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        @if(session('name'))
        Record stored for {{session('name')}}
        @endif
        <center>
            <div>
                <table border="1">
                    <caption> Our users </caption>
                    <thead>
                        <th> Sr.no. </th>
                        <th> Name </th>
                        <th> Email </th>
                        <th> Phone Number </th>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $user)
                        <tr>
                        <td> {{++$key}} </td>     
                        <td> {{$user['name']}} </td>     
                        <td> {{$user['email']}} </td>     
                        <td> {{$user['phone_number']}} </td>     
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                {{$users->links()}}
            </div>
        </center> 
        <style>
            .w-5{
                display:none;
            }
        </style>
    </body>
</html>