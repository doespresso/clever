<div class="container">
    <div class="row">
        <h1>{{$d['title']}}</h1>
        <?php $fields = $d['fields'];?>
        <p class="lead">{{$d['description']}}</p>
        <div class="order-params">
            @foreach($fields as $key =>$f)
            <li>{{$f['title']}}: <b>{{Input::get($key)}}</b></li>
            @endforeach
        </div>
        <div class="doc-form">
            {{Form::open(array('id'=>'order_params','url' => 'order','method' => 'post','role' => 'form')) }}
            <div class="form-group">
            {{Form::text('fio', null, array('class'=>'form-control input-block','placeholder'=>'ФИО'))}}
            </div>
            <div class="form-group">
            {{Form::text('phone', null, array('class'=>'form-control input-block','placeholder'=>'+7 ...'))}}
            </div>
            <div class="form-group">
            {{Form::text('email', null, array('class'=>'form-control input-block','placeholder'=>'e-mail'))}}
            </div>
            <div class="form-group">
                {{Form::submit('Отправить',$attributes = array('class'=>'btn btn-primary pull-right','id'=>'order_finish'))}}
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>
