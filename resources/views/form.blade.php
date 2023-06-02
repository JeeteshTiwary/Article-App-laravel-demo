<center> <small> Form Example in Laravel </small> </center>
@if($_GET['msg'])
    <div class="alert alert-warning">
        <strong> Warning! </strong> {{$_GET['msg']}}
    </div>
@endif

<h2> Login Form </h2>
<form action="" method="post">
    @csrf
<input type="text" placeholder="your name here..." name="name" /> <br/><br/>
<input type="number" placeholder="your age here..." name="age" required /><br/><br/>
<input type="submit" value="Submit" />
</form>
