@if($menulinks->count()>0)
<select name="obj_type" class="form-control selectpicker input-lg" data-style="btn-primary" title="Выберите тип объекта">
<option value="Квартира">Квартира</option>
<option value="Дом">Дом</option>
<option value="Земельный участок">Земельный участок</option>
<option value="Нежилое помещение">Нежилое помещение</option>
<option value="Другое">Другое</option>
</select>
@endif
