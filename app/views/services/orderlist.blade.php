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
                <span class="price-from">от {{$doctype['price_from']}} руб.</span>
                <button id="getegrp" data-ordertype="{{$key}}" class="btn btn-block btn-order startorder">получить</button>
            </div>
        </div>
    </div>
</div>
<hr/>
@endforeach
