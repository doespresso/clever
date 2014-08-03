<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="@if(isset($meta_description)){{$meta_description}}@else{{Setting::get('home_description');}} @endif">
  <meta name="keywords" content="@if(isset($meta_keywords)){{$meta_keywords}}@else{{Setting::get('home_keywords');}} @endif">
  <meta name="author" content="{{Setting::get('home_title');}}">
  <link href="{{asset('assets/css/app.css')}}" rel="stylesheet">
  <link rel="shortcut icon" href="{{asset('favicon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('assets/favicons/favicon_64.png')}}"/>
  <link rel="apple-touch-icon" type="image/png" href="{{asset('assets/favicons/favicon_57.png')}}" />
  <link rel="apple-touch-icon" type="image/png" href="{{asset('assets/favicons/favicon_114.png')}}" sizes="114x114" />
  <link rel="apple-touch-icon" type="image/png" href="{{asset('assets/favicons/favicon_72.png')}}" sizes="72x72" />
  <link rel="apple-touch-icon" type="image/png" href="{{asset('assets/favicons/favicon_144.png')}}" sizes="144x144" />
  <script src="{{asset('assets/js/modernizr.js')}}"></script>
  <script src="{{asset('assets/js/clever.js')}}"></script>
  <title>@if(isset($meta_title)){{$meta_title}}@else{{Setting::get('home_title');}} @endif</title>
</head>
<?php
$printclass="";
$printstyle="";
if (isset($pagetype)){
    $printclass=' class="'.$pagetype.'" ';
    if($pagetype=='servicepage'){
        $printstyle=' style="background-color:'.$service->color.'"';
    }
}
?>
<body {{$printclass}}{{$printstyle}}name="top">
@include('menu.topmenu')
<div id="body-wrapper">

<div class="bar-fixed-top dark" id="topbar">
  <div class="container">
    <div class="row">
     <div class="col-md-12">
       <ul role="navigation">
         <li><a href="{{asset('questions')}}">Вопрос/ответ</a></li>
         <li class="visible-md visible-lg"><a href="{{asset('comments')}}">Отзывы</a></li>
         <li class="visible-md visible-lg"><a href="{{asset('articles')}}">Статьи</a></li>
         <li class="visible-md visible-lg"><a href="{{asset('contacts')}}" data-toggle="modal">Контакты</a></li>
       </ul>
       <ul class="pull-right" role="usercabinet">
         @if (Auth::check())
         <?php
           $user = Auth::user();
           $messages = $user->messages()->Isunreaded();
           $newmessages = $messages->count();
           ?>
         <li><a href="{{asset('cabinet')}}">{{$user->company}}</a>@if($newmessages>0) <div class="new-messages animated bounce">{{$newmessages}}</div>@endif</li>
         @else
         <li><a href="{{asset('cabinet')}}">Личный кабинет</a></li>
         @endif
       </ul>
     </div>
    </div>
  </div>
</div>
  @if ($errors->any())
  <div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="list-unstyled">
            {{ implode('', $errors->all('
            <li class="error">:message</li>
            ')) }}
          </ul>
        </div>
      </div>
    </div>
  </div>
  @endif
  @if(Session::get('message'))
  <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <div class="container">
      <div class="row">
        <div class="col-md-12"><span class="glyphicon glyphicon-ok"></span>{{Session::get('message')}}</div>
      </div>
    </div>
  </div>
  @endif
@yield('main')
<footer class="bar-fixed-bottom dark" id="footer" role="contactinfo">
  <div class="container">
    <div class="row">
      <div class="col-xs-2 col-md-3 col-lg-3">
        <a class="adress-icon" href="{{asset('contacts')}}"></a>
        <a class="visible-md visible-lg" href="../contacts"><adress>{{Setting::get('adress');}}</adress></a>
      </div>
      <div class="col-xs-3 col-sm-3 visible-sm visible-xs text-center"><a class="simple" href="{{asset('specials')}}">АКЦИИ</a></div>
      <div class="col-xs-2 col-md-3 col-lg-2 mobile-right">
        <a class="tel-icon to-right" href="{{asset('contacts')}}"></a>
        <a class="visible-md visible-lg text-right" href="{{asset('contacts')}}"><tel>+7 {{Setting::get('tel1');}}</tel><br/><tel>{{Setting::get('tel2');}}</tel></a>
      </div>
      <div class="col-xs-2 col-sm-2 col-md-1 col-lg-2 text-center"></div>
      <a id="to-top" class="glyphicon glyphicon-arrow-up4" attr-ani="sm-scrl" href="#top"></a>
      <div class="col-xs-3 col-sm-3 visible-sm visible-xs text-center"><a class="simple" href="{{asset('comments')}}">ОТЗЫВЫ</a></div>
      <div class="col-md-3 col-md-offset-2 col-lg-offset-2 col-lg-3 visible-md visible-lg">
        <a class="copyright-icon" href="{{asset('contacts')}}"></a>
        <a href="{{asset('contacts')}}"><copyright>{{Setting::get('copyright');}}</copyright></a>
      </div>
    </div>
  </div>
</footer>
</div>
</body>
</html>
