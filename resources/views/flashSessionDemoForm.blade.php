<h2> Flash Session Demo Form </h2>
<!-- @if(session('status'))
    <h3> {{session('status')}} </h3>
@endif -->
    
@if( session('name'))
    <h3> Hello, {{session('name')}} </h3>
@endif

@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

<form action="flashSession" method="POST">
    @csrf
    <input type="text" placeholder="your name here..." name="name" /> <br/><br/>
    <input type="submit" value="Submit" />
</form>