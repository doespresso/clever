@extends('layouts.main')

@section('main')
@if (!Auth::check())
<div class="section-wrapper">
  <section class="page animated fadeInUpBig">
    <div class="container">
      <div class="row page-wrapper">
        <div class="col-md-12">
          <div class="content">
            <div class="header">
              <div class="row">
                <div class="col-md-7"><h1>Спасибо за вопрос!</h1></div>
              </div>
            </div>
            <div class="body">
              <p class="lead"><b>Чтобы вопрос был направлен для ответа нашему специалисту авторизуйтесь или зарегистрируйтесь.</b><br />Вопрос будет сохранен атоматически.
              </p>

              <h3>Продолжить:</h3>

              <p class="lead">
                <a href="{{route('login.index')}}" class="btn btn-lg btn-primary">Авторизация</a>
                <a href="{{route('login.register')}}" class="btn btn-lg btn-primary">Регистрация</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endif
@stop
