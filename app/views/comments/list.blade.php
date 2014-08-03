@if ($comments->count())
<ul class="list-unstyled comments">
  @foreach ($comments as $comment)
  <li>
    <div class="row">
      <div class="col-md-3">
        <div class="author" role="author">{{$comment->user->company}}</div>
<!--        @if($comment->service)<p><a class="to-service" href="../services/{{$comment->service->alias}}"><span class="service-link label" style="background-color: {{$comment->service->color}};">{{$comment->service->name}}</span></a></p>@endif-->
      </div>
      <div class="col-md-9">
        <p role="comment" id="#q{{$comment->id}}">{{$comment->comment}}</p>
      </div>
    </div>
  </li>
  @endforeach
</ul>
{{$comments->links();}}
@endif