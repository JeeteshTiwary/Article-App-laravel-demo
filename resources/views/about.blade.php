<x-header page="About" />
<x-navbar />

@php $value = true; @endphp

@if($value)
<center>
{{URL::current()}}
    <h1> About us  </h1>
    <!-- {{URL::current()}} -->
    <a href="/"> welcome page</a>
</center>
@else
    Something went wrong
@endif

<x-footer />
