@if($menulinks->count()>0)
<div class="form-group">
<select name="service_id" class="form-control selectpicker" data-style="btn-primary" title="Выберите услугу">
@foreach ($menulinks as $service)
<option value="{{$service->id}}">{{$service->name}}</option>
@endforeach
</select>
</div>
@endif
