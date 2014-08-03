@extends('layouts.main')
@section('main')
<div class="section-wrapper">
  <section class="page animated fadeInLeftBig">
      <div class="container">
        <div class="row page-wrapper">
          <div class="col-md-2 col-lg-3">
            <div class="context">
              <div class="media" style="background-image: url({{asset('assets/picto/'.$service->icon.'.svg')}})">
              </div>
            </div>
          </div>
          <div class="col-md-10 col-lg-9">
            <div class="content">
              <div class="header">
                <div class="row">
                  <div class="col-md-7"><h1>{{$service->name}}</h1></div>
                    <ul class="nav nav-pills" id="service-tabs">
                      <li class="active"><a id="tab-products" href="#products" data-toggle="tab">Продукты</a></li>
                      <li><a id="tab-solutions" href="#solutions" data-toggle="tab">Решения</a></li>
                      <!--<li><a id="tab-specials" href="#specials" data-toggle="tab">Акции</a></li>-->
                    </ul>

                </div>
              </div>
              <div class="body">
                <div class="tab-content">
                  <div class="tab-pane active" id="products">{{$service->products}}</div>
                  <div class="tab-pane" id="solutions">{{$service->solutions}}</div>
                  <!--<div class="tab-pane" id="specials">{{$service->specials}}</div>-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
@stop
