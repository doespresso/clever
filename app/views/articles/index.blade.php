@extends('layouts.main')

@section('main')
<div class="section-wrapper">
  <section class="page articles-page animated fadeInUpBig">
      <div class="container">
        <div class="row page-wrapper">
          <div class="col-md-12">
            <div class="content">
              <div class="header">
                <div class="row">
                  <div class="col-md-3 visible-md visible-lg" style="overflow: hidden;">
                    <h1 class="list-show">Рубрики</h1>
                  </div>
                  <div class="col-md-9"><h1 class="list-show">Свежие публикации</h1></div>
                </div>
              </div>
              <div class="body">
               @include('articles.list')
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
@stop
