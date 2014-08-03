@extends('layouts.main')

@section('main')
<div class="section-wrapper">
  <section class="page comments-page put animated fadeInUpBig">
      <div class="container">
        <div class="row page-wrapper">
          <div class="col-md-12">
            <div class="content">
              <div class="header">
                <div class="row">
                  @if (Session::get('errors'))
                    <?php $fire = 'class="fire"'?>
                  @else
                    <?php $fire=''?>
                  @endif
                  <div class="col-md-7"><h1 class="put-show">Отзывы клиентов CLEVER</h1><h1 class="list-show">Ваш отзыв</h1></div>
                    <ul class="nav nav-pills" id="service-tabs">
                      <li class="active list-show"><a class="tab" href="#comments" data-toggle="tab">Вернуться к отзывам</a></li>
                      <li class="put-show"><a class="tab btn-go" href="#write" data-toggle="tab" {{$fire}}>Написать отзыв</a></li>
<!--                      <span class="glyphicon glyphicon-pen-alt-fill"></span>-->
                    </ul>
                </div>
              </div>
              <div class="body">
                <div class="tab-content">
                  <div class="tab-pane active" id="comments">
                    @include('comments.list')
                  </div>
                  <div class="tab-pane" id="write">
                    @include('comments.create')
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
