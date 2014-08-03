@extends('layouts.main')

@section('main')
<div class="section-wrapper login-section">
  <section class="site-panel all-center login-center animated bounceIn">
      <div class="centerer">
            <div class="container">
              <div class="row">
                <div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
      <div class="row page-wrapper">
        <div class="col-md-5">
          <div class="context">
            <div class="media">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="content">
            <div class="header">
              <h3>Вход</h3>
            </div>
            <div class="body">
              {{ Form::open(array('route' => 'login.index')) }}
              <div class="form-group">
<!--                <div class="input-group">-->
<!--                  <span class="input-group-addon"><span class="glyphicon glyphicon-at"></span></span>-->
                  {{ Form::text('email',null,array("class"=>"form-control input-lg input-login","placeholder"=>"E-mail")) }}
<!--                </div>-->
              </div>
              <div class="form-group">
<!--                <div class="input-group">-->
<!--<span class="input-group-addon"><span class="glyphicon glyphicon-lock-fill"></span></span>-->
                  {{ Form::password('password',array("class"=>"form-control input-lg input-login","placeholder"=>"Пароль")) }}
<!--                </div>-->
              </div>
              <div class="row">
                <div class="col-md-5 col-xs-12">
                  {{ Form::submit('Вход', array('class' => 'btn-primary btn btn-lg btn-block')) }}
                </div>
                <div class="col-md-7 col-xs-12 text-center">
                  <h4>
<!--                    <span class="glyphicon glyphicon-key-stroke"></span>-->
                    <a href="{{route('login.register')}}"> Регистрация</a></h4>
                </div>
              </div>
              {{ Form::close() }}
            </div>
          </div>
        </div>
        </div>
      </div>
            </div>
            </div>
      </div>

  </section>
</div>
@stop


