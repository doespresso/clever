@extends('layouts.main')
@section('main')
<div class="section-wrapper">
  <section class="page articles animated fadeInLeftBig">
      <div class="container">
        <div class="row page-wrapper">
          <div class="col-md-12">
            <article class="content">
          <div class="header">
            <div class="row">
              <div class="col-md-3 visible-md visible-lg" style="overflow: hidden;">
<!--                <a href="/articles" class="btn btn-lg btn-primary">назад к списку</a>-->
                <div class="category"><a href="{{asset('/articles/cat')}}/{{$article->category->alias}}">{{$article->category->name}}</a></div>
              </div>
              <div class="col-md-9"><h1 class="list-show">{{$article->name}}</h1></div>
            </div>
          </div>
              <div class="body">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="pub-date" role="date">{{$article->updated_at}}</div>
                    </div>
                    <div class="col-md-9" role="content">
                      {{$article->html}}
                    </div>
                  </div>
              </div>
            </article>
          </div>
        </div>
      </div>
  </section>
</div>
@stop
