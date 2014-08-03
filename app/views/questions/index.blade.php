@extends('layouts.main')

@section('main')
<div class="section-wrapper">
  <section class="page questions-page animated fadeInUpBig">
      <div class="container">
        <div class="row page-wrapper">
          <div class="col-md-12">
            <div class="content">
              <div class="header">
                <div class="row">
                  @if (Session::get('errors'))
                    <?php $fire = ' attr-fire="fire"'?>
                  @else
                    <?php $fire=''?>
                  @endif
                  <div class="col-md-3 visible-md visible-lg" style="overflow: hidden;">
                    <h1 class="list-show">Услуга</h1><h5 class="ask-show">Ваши контактные данные:</h5>
                  </div>
                  <div class="col-md-3"><h1 class="list-show">Вопрос/ответ</h1><h1 class="ask-show">Ваш вопрос</h1></div>
                    <ul class="nav nav-pills" id="service-tabs">
                      <li class="list-show"><a class="tab btn-go" href="#ask" data-toggle="tab"{{$fire}}>Спросить</a></li>
                      <li class="dropdown pull-right list-show">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> @if(isset($cat))
                          {{$cat->name}}@elseВыбрать услугу@endif<b class="caret"></b></a>
                          <ul class="dropdown-menu">
                            @include('menu.filterlist')
                          </ul>
                        </li>
                      <li class="ask-show"><a class="tab" href="#questions" data-toggle="tab">Вернуться к вопросам</a></li>
                    </ul>
                </div>
              </div>
              <div class="body">
                <div class="tab-content">
                  <div class="tab-pane active" id="questions">
                    @include('questions.list')
                  </div>
                  <div class="tab-pane" id="ask">
                    @include('questions.create')
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
