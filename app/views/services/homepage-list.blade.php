@extends('layouts.main')

@section('main')
<div class="section-wrapper animated fadeInDownBig">
  <section class="service-navigator" id="homenav">
    <div class="wrapper">
    <div class="container">
      <div class="row page-wrapper">
        <div class="col-md-5">
          <div class="context">
            <div class="gc">Группа<br />Компаний</div>
            <div class="nav-title">
              <div class="item current" id="titlehome">Умные Решения</div>
              @foreach ($services as $title)
              <div class="item" id="title-{{$title->alias}}">{{$title->name}}</div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="col-md-6 col-md-offest-1">
          <div class="content" id="rotator-container">
            <div id="rotator" class="animated fadeInRightBig" role="navigation">
              <?php
              $all = $services->count();
              $step = round(360/$all);
              ?>
              <div id="circle"></div>
              @foreach ($services as $c => $link)
<!--              <a href="#{{$link->alias}}" class="picto" attr-name="{{$link->alias}}" style="background-image:url(/assets/picto/croped/{{$link->icon}})"></a>-->
<!--                <img src="/assets/picto/croped/{{$link->icon}}"  type="image/svg+xml" width="100%" height="100%">-->
              <a href="#{{$link->alias}}" class="picto" attr-name="{{$link->alias}}" target="_top"><?php readfile (public_path().'/assets/picto/croped/'.$link->icon.'.svg');?></a>
              <div class="line" id="line-{{$link->alias}}"><div></div></div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
</div>
<div id="service-list-wrapper">
@if ($services->count())
@foreach($services as $service)
@include('services.homepage-service')
@endforeach
@else
@endif
</div>
@stop
