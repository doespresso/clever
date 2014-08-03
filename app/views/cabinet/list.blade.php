@if ($messages->count())
<ul class="list-unstyled messages">
@foreach($messages as $message)
<li class="readed{{$message->isnew}}">
  <div class="container">
    <div class="row">
      <div class="col-md-3"><p><span class="glyphicon glyphicon-mail"></span> {{$message->created_at}} <span class="label label-warning">новое</span><p></div>
      <div class="col-md-9"><p>{{$message->message}}</p></div>
    </div>
  </div>
</li>
@endforeach
{{$messages->links();}}
</ul>
<?php
$new_messages = Auth::user()->messages()->update(array('isnew'=>null));
?>
@else
<p>Информационных сообщений нет</p>
@endif
