@if (Auth::check())
<!--<h2>Новый отзыв {{Auth::user()->company}}</h2>-->
<div class="row">
<div class="col-md-12">
{{ Form::open(array('route' => 'comments.store','role'=>'form')) }}
@include('services.select')
<div class="form-group">
{{ Form::textarea('comment',null,array('class'=>'form-control'))}}
</div>
{{ Form::submit('Отправить', array('class' => 'btn btn-lg btn-info')) }}
{{ Form::close() }}
</div>
</div>
@else
<div class="row">
  <div class="col-md-12">
    <p class="lead">Отзывы о работе группы компаний могут оставлять только зарегистрированные клиенты. Пожалуйста, авторизуйтесь.</p>
  <p class="lead">
    <a href="{{route('login.index')}}" class="btn btn-lg btn-primary">Авторизация</a>
  </p>
</div>

</div>
@endif






