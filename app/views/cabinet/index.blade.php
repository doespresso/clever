@extends('layouts.main')
@section('main')
<div class="section-wrapper">
  <section class="page animated fadeInUpBig">
    <div class="container">
      <div class="row page-wrapper">
        <div class="col-md-12">
          <div class="content">
            <div class="header">
              <div class="row">
                <div class="col-md-7"><h1><span class="glyphicon glyphicon-unlock-stroke"></span> Личный кабинет</h1></div>
                <ul class="nav nav-pills">
                  @if($user->hasRole('admin'))<li><a href="{{route('adminpanel')}}">Администрирование <span class="glyphicon glyphicon-new-window"></span></a></li>@endif
                  <li><a href="{{route('logout')}}">Выход <span class="glyphicon glyphicon-lock-fill"></span></a></li>
                </ul>
              </div>
            </div>
            <div class="container">
              <div class="row alert alert-warning">
                <div class="col-md-3">
                  <span class="glyphicon glyphicon-at"></span> {{$user->email}}
                </div>
                <div class="col-md-3">
                  <span class="glyphicon glyphicon-user"></span> {{$user->company}}
                </div>
                <div class="col-md-3">
                  <span class="glyphicon glyphicon-iphone"></span> {{$user->contact}}
                </div>
              </div>
            </div>
            <div class="body">
              <div class="row">
                <div class="col-md-12">
                  @include('cabinet.list')
                </div>
              </div>
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
