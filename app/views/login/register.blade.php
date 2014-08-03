@extends('layouts.main')

@section('main')
<div class="section-wrapper">
  <section class="site-panel all-center register-center animated bounceIn">
    <div class="centerer">
    <div class="container">
      <div class="row page-wrapper">
        <div class="col-md-4">
          <div class="context">
            <div class="media" style="background-image:url(/assets/img/key.svg)"></div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="content">
            <div class="header">
              <h3>Регистрация для организаций</h3>
            </div>
            <div class="body">
              {{ Form::open(array('route' => 'login.register')) }}
              <div class="row">
              <div class="col-md-12">
              <div class="form-group">
                {{ Form::text('company',null,array("placeholder"=>"Название организации", "class"=>"form-control input-lg")) }}
              </div>
              </div>
              <div class="col-md-12">
              <div class="form-group">
                {{ Form::text('contact',null,array("placeholder"=>"Контактные телефоны", "class"=>"form-control input-lg")) }}
              </div>
              </div>
              <div class="col-md-12">
              <div class="form-group">
                {{ Form::text('email',null,array("placeholder"=>"E-mail","class"=>"form-control input-lg")) }}
              </div>
              </div>
              <div class="col-md-12">
              <div class="form-group">
                {{ Form::password('password',array("class"=>"form-control input-lg","placeholder"=>"Пароль")) }}
              </div>
              </div>
              <div class="col-md-12">
              <div class="form-group">
                {{ Form::password('password_confirmation',array("class"=>"form-control input-lg","placeholder"=>"Подтверждение пароля")) }}
              </div>
              </div>
              </div>

              <div class="row">
                <div class="col-md-6 col-xs-12">
                  {{ Form::submit('Зарегистрироваться', array('class' => 'btn-primary btn btn-lg btn-block')) }}
                </div>
                <div class="col-md-6 col-xs-12 text-center">
                  <h4><a href="{{route('login.index')}}"> Вход</a></h4>
<!--                  <span class="glyphicon glyphicon-unlock-stroke"></span> -->
                </div>
              </div>
              {{ Form::close() }}
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </section>
</div>
@stop

