<div class="tab-pane" id="order">
    {{ Form::open(array('route' => 'egrp', 'id' => 'get_egrp', 'class' => 'form-horizontal')) }}
    <div class="row"><div class="col-sm-12"><label for="" class="field-caption">Тип объекта:</label></div>
        <div class="col-sm-12"><div class="form-group">@include('egrp.select')</div></div></div>
    <div class="row">
        <div class="col-sm-3 hidden"><label for="" class="field-caption">Точный адрес объекта:</label></div>
        <div class="col-sm-12"><div class="form-group">{{ Form::text('obj_address',null,array("placeholder"=>"Точный адрес объекта", "class"=>"form-control")) }}</div></div>
    </div>
    <div class="row">
        <div class="col-sm-3 hidden"><label for="" class="field-caption">Кадастровый номер объекта:</label></div>
        <div class="col-sm-12"><div class="form-group">{{ Form::text('obj_number',null,array("placeholder"=>"Кадастровый (условный номер) объекта", "class"=>"form-control")) }}</div></div>
    </div>
    <div class="row"><div class="col-sm-12"><label for="" class="field-caption">Способ получения документов:</label></div></div>
    <div class="row">
        <div class="col-sm-3 hidden"><label for="" class="field-caption">Способ получения документа, удобный вам:</label></div>
        <div class="col-sm-12">
            <div class="form-group">
                <label class="radio">
                    <input type="radio" checked name="delivery_type" id="inlineRadio2" value="Доставка курьером на указанный адрес"> Доставка курьером на указанный адрес
                </label>
                <label class="radio">
                    <input type="radio" name="delivery_type" id="inlineRadio1" value="Самостоятельно в офисе CLEVER"> Самостоятельно в офисе CLEVER
                </label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 hidden"><label for="" class="field-caption">Адрес доставки документов:</label></div>
        <div class="col-sm-12"><div class="form-group">{{ Form::text('order_address',null,array("placeholder"=>"Адрес доставки документов", "class"=>"form-control")) }}</div></div>
    </div>
    <div class="row">
        <div class="col-sm-3 hidden"><label for="" class="field-caption">Имя заказчика:</label></div>
        <div class="col-sm-12"><div class="form-group">{{ Form::text('order_fio',null,array("placeholder"=>"ФИО заказчика", "class"=>"form-control")) }}</div></div>
    </div>
    <div class="row">
        <div class="col-sm-3 hidden"><label for="" class="field-caption">Контактный телефон:</label></div>
        <div class="col-sm-12"><div class="form-group">{{ Form::text('order_phone',null,array("placeholder"=>"Контактный телефон заказчика", "class"=>"form-control")) }}</div></div>
    </div>
    <div class="row">
        <div class="col-sm-3 hidden"><label for="" class="field-caption">Контактный e-mail:</label></div>
        <div class="col-sm-12"><div class="form-group">{{ Form::text('order_email',null,array("placeholder"=>"E-mail заказчика", "class"=>"form-control")) }}</div></div>
    </div>
    <div class="row">
        <div class="col-sm-3 hidden"><label for="" class="field-caption">Комментарий к заказу:</label></div>
        <div class="col-sm-12"><div class="form-group">{{ Form::text('order_comment',null,array("placeholder"=>"Комментарий к заказу", "class"=>"form-control")) }}</div></div>
    </div>
    {{ Form::submit('Отправить заказ', array('class' => 'btn btn-lg btn-block btn-go')) }}
    {{ Form::close() }}
</div>