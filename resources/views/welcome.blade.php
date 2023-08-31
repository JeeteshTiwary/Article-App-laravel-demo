<x-header page="welcome" />
<center>
    <h1> Welcome page </h1>
    <div class="d-flex justify-content content-align-center col-md-3">
        <a href="{{Route('register')}}"> <button class="btn btn-info"> Register </button> </a>
        <a href="{{Route('login')}}"> <button class="btn btn-primary mx-5"> Login </button> </a>
    </div>
</center>

<x-footer />
