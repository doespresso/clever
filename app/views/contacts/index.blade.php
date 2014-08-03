@extends('layouts.main')
@section('main')
<div class="section-wrapper no-bottom-pad">
  <section class="site-panel no-bottom-pad animated bounceIn">
    <div class="container">
      <div class="row page-wrapper">
        <div class="col-md-4">
          <h1>Группа компаний CLEVER</h1>
          <p>{{Setting::get('ooo');}}</p>
        </div>
        <div class="col-md-3">
          <span class="glyphicon glyphicon-iphone bigico"></span><br />
          <div class="contact-phones">
            <h3>+7 {{Setting::get('tel1');}}<br />+7 {{Setting::get('tel2');}}</h3>
            <p>{{Setting::get('time');}}</p>
          </div>
        </div>
        <div class="col-md-4">
          <span class="glyphicon glyphicon-map-pin-fill bigico"></span><br />
          <h3>{{Setting::get('adress');}}</h3>
          <p>{{Setting::get('time_office');}}</p>
        </div>
        <div class="col-md-3">

        </div>
      </div>
    </div>
    <div class="contact-map">{{Setting::get('map');}}</div>
  </section>
</div>
@stop
