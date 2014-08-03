@if ($questions->count())
<ul class="list-unstyled questions @if(isset($cat)) filtered@endif">
  @foreach ($questions as $question)
  <li>
    <div class="row">
      <div class="col-md-3">
        <div class="service-cell">{{$question->service->name}}</div>
      </div>
      <div class="col-md-9">
        <div class="question-cell"><p role="question">{{$question->question}} <a class="show-answer" data-toggle="collapse" href="#q{{$question->id}}">Ответ <span>x</span></a></p>
        <div id="q{{$question->id}}" class="panel-collapse collapse"><p role="answer active">{{$question->answer}}</p></div></div>
      </div>
    </div>
  </li>
  @endforeach
</ul>
{{$questions->links();}}
@endif