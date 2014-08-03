@extends('layouts.scaffold')

@section('main')

<h1>Create Service</h1>

{{ Form::open(array('route' => 'services.store')) }}
<ul>
  <li>
    {{ Form::label('name', 'Name:') }} {{ Form::text('name') }}
  </li>

  <li>
    {{ Form::label('alias', 'Alias:') }} {{ Form::text('alias') }}
  </li>

  <li>
    {{ Form::label('announce', 'Announce:') }} {{ Form::text('announce') }}
  </li>



  <li>
    {{ Form::label('products', 'Products:') }} {{ Form::textarea('products') }}
  </li>

  <li>
    {{ Form::label('solutions', 'Solutions:') }} {{ Form::textarea('solutions') }}
  </li>

  <li>
    {{ Form::label('specials', 'specials:') }} {{ Form::textarea('specials') }}
  </li>

  <li>
    {{ Form::label('icon', 'Icon:') }} {{ Form::text('icon') }}
  </li>

  <li>
    {{ Form::label('published', 'Published:') }} {{ Form::text('published') }}
  </li>

  <li>
    {{ Form::label('sort', 'Sort:') }} {{ Form::text('sort') }}
  </li>

  <li>
    {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
  </li>
</ul>
{{ Form::close() }}

@if ($errors->any())
<ul>
  {{ implode('', $errors->all('
  <li class="error">:message</li>
  ')) }}
</ul>
@endif

@stop


