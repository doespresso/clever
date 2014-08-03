
<div class="red-form">
<div class="row">
{{ Form::open(array('route' => 'questions.store','role'=>'form')) }}
<div class="col-md-3">
<div class="contact-section">
@if (Auth::user())
    <div class="contact">{{Auth::user()->company}}</div>
@else
  <div class="form-group">
    {{ Form::text('q_company',null,array("placeholder"=>"Ф.И.О.", "class"=>"form-control")) }}
  </div>
<!--  <div class="form-group">-->
<!--    {{ Form::text('q_company',null,array("placeholder"=>"Название организации", "class"=>"form-control")) }}-->
<!--  </div>-->
  <div class="form-group">
    {{ Form::text('q_email',null,array("placeholder"=>"E-mail", "class"=>"form-control")) }}
  </div>
  <div class="form-group">
    {{ Form::text('q_tel',null,array("placeholder"=>"Контактный телефон", "class"=>"form-control")) }}
  </div>
@endif
</div>
</div>
<div class="col-md-9">
  <div class="text-section">
    @include('services.select')
    <div class="form-group">
    {{ Form::textarea('question',null,array('class'=>'form-control'))}}
    </div>
    <div class="row">
      <div class="col-md-2 col-sm-3">{{ Form::submit('Отправить', array('class' => 'btn btn-lg btn-info btn-block')) }}</div>
      <div class="col-md-6 col-sm-6"><div class="inputall">Все поля формы необходимо заполнить</div></div>
        </div>
    {{ Form::close() }}
  </div>
</div>
</div>
</div>





