<?php
$fields = $d['fields'];
$ucompany = null;
$ucontact = null;
$uemail = null;
if (isset($cuser)) {
    $ucompany = $cuser->company;
    $ucontact = $cuser->contact;
    $uemail = $cuser->email;
}
?>
<div class="container">
    <div class="row order_forms">
        <h1>{{$d['title']}}</h1>
        {{Form::open(array('id'=>'order_params','url' => 'order','method' => 'post','role' => 'form')) }}
        <p class="lead">Параметры документа:</p>

        <div id="doc_result_params" class="hidden doc-form">
        </div>
        <div id="result_form" class="controls">
            <button id="order_btn_edit" class="btn pull-right hidden">Изменить</button>
            <button id="order_btn_exit" class="btn btn-primary pull-right hidden">Закрыть</button>
        </div>
        <div id="doc_params" class="active doc-form">
            {{Form::hidden('type',$type)}}
            {{Form::hidden('step','2')}}
            @foreach ($fields as $key => $f)
            @if(isset($f['type']) && $f['type']=='text')
            <div class="form-group">{{Form::text($key, null, array('class'=>'form-control input-block required','attr-title'=>$f["title"],'placeholder'=>$f["title"]))}}</div>
            @else
            <div class="controls">
                <div class="form-group">
                    <label for="var">Тип и сроки:</label>
                    <select name="var" class="form-control selectpicker">
                        @foreach ($f['par'] as $option)
                        <option>{{$option['title']}} - {{$option['price']}} руб</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            @endforeach
            <div class="controls">
                <div class="row">
                    <div class="col-md-6 col-md-offset-6">
                        <button id="order_btn_next" class="btn btn-primary pull-right">Оформить</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="doc_contacts" class="doc-form hidden">
            <p class="lead">Контактная информация:</p>

            <div class="form-group">
                {{Form::text('fio', $ucompany, array('class'=>'form-control input-block required','placeholder'=>'ФИО'))}}
            </div>
            <div class="form-group">
                {{Form::text('phone', $ucontact, array('class'=>'form-control input-block required','placeholder'=>'+7 ...'))}}
            </div>
            <div class="form-group">
                {{Form::text('email', $uemail, array('class'=>'form-control input-block required','placeholder'=>'E-mail'))}}
            </div>
            <div class="controls">
                <button id="order_btn_finish" class="btn btn-primary pull-right">Заказать</button>
            </div>
        </div>
        {{Form::close()}}
    </div>
</div>
