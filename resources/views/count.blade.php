<center>
<h2 class="mt-5"> Example of conditional statements </h2>
<h3> List Using for: 
<select>
    <option value="">List</option> 
    @for($i=0;$i<10;$i++)
        @if($i == 5)
            continue;
        @else
            <option value="{{$i}}">{{$i}}</option> 
        @endif
    @endfor
</select>
</h3>

<h4>Name List Using foreach: 
  @php  $List = ["Ram","Shyam","Mohan"]; @endphp
<select>
    <option value="">Name List</option> 
    @foreach($List as $name)
        <option value=>{{$name}}</option> 
    @endforeach
</select>
</h4>
</center>