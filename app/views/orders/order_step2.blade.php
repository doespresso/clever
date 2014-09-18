<div class="container">
    <div class="row">
        <h1>{{$d['title']}}</h1>
        <?php $fields = $d['fields'];?>
        <p class="lead">{{$d['description']}}</p>
        <div class="doc-form">
            {{Form::open(array('id'=>'order_params','url' => 'order','method' => 'post','role' => 'form')) }}
            @foreach ($fields as $key => $f)
            @if(isset($f['type']) && $f['type']=='text')
            <div class="form-group">
                {{Form::text($key, null, array('class'=>'form-control input-block','placeholder'=>$f["title"]))}}
            </div>
            @else
            <div class="form-group">
                <select>
                    @foreach ($f as $option)
                    <option>{{$option['title']}} - {{$option['price']}} руб</option>
                    @endforeach
                </select>
            </div>
            @endif
            @endforeach
            <hr/>
            <div class="form-group">
                {{Form::submit('Продолжить',$attributes = array('class'=>'btn btn-primary pull-right','id'=>'order_next'))}}
            </div>

            {{Form::close()}}
        </div>
    </div>
</div>
