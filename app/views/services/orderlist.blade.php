<?php
$doctypes = Setting::get('docs');
?>

@foreach($doctypes as $key => $doctype)
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9">
                <h3>{{$doctype['title']}}</h3>
                <p>{{$doctype['description']}}</p>
            </div>
            <div class="col-md-3">
                <button id="getegrp" data-ordertype="{{$key}}" class="btn btn-block btn-primary startorder">Получить</button>
            </div>
        </div>
    </div>
</div>
<hr/>
@endforeach
