<x-header page="welcome" />
<x-navbar />

@php $value = true; @endphp
@if($value)
<center>
    <h1> Welcome page </h1>

    <a href="{{URL::to('/about')}}" > about us </a>
    <div class="mx-5"> 
    <a href="https://google.com"> google </a>
</div>
</center>
@else
    Something went wrong
@endif

<!-- @include('count') -->
<x-footer />
