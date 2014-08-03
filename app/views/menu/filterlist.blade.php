@foreach ($menulinks as $link)
<li><a href="{{route('questions.category')}}/{{$link->id}}">{{$link->name}}</a></li>
@endforeach
<!--<li class="divider"></li>-->
<li><a href="{{asset('questions')}}">Все вопросы</a></li>