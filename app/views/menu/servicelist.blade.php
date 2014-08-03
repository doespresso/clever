@foreach ($menulinks as $link)
<li><a href="../cat/{{$link->service_id}}">{{$link->name}}</a></li>
@endforeach