<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>user list</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    </head>
    <body>
        @if(session('name'))
        Record stored for {{session('name')}}
        @endif

        @if(session('msg'))
            {{session('msg')}}
        @endif
        
        <center>
            <div>
                <h2> Our Users </h2>                   
                <table border="1">
                    <thead>
                        <th> Sr.no. </th>
                        <th> Name </th>
                        <th> Email </th>
                        <th> Phone Number </th>
                        <th> Operations </th>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $user)
                        <tr>
                        <td> {{++$key}} </td>     
                        <td> {{$user['name']}} </td>     
                        <td> {{$user['email']}} </td>     
                        <td> {{$user['phone_number']}} </td>     
                        <td>
                            <a class="btn btn-outline-info" href="/update/{{$user['id']}}"> Update </a>
                            <a class="btn btn-outline-danger" href="/delete/{{$user['id']}}"> Delete </a> 
                        </td>     
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