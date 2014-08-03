<div class="navbar navbar-default navbar-fixed-top" id="topnav">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{route('home')}}"></a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right" role="navigation">
        @foreach ($menulinks as $link)
        @if (isset($pagetype) && $pagetype == 'homepage')
        <li><a href="#{{$link->alias}}">{{$link->name}}</a></li>
        @else
            @if(isset($service) && ($service->alias == $link->alias))
            <li class="active"><a href="{{asset('services')}}/{{$link->alias}}">{{$link->name}}</a></li>
            @else
            <li><a href="{{asset('services')}}/{{$link->alias}}">{{$link->name}}</a></li>
            @endif
        @endif
        @endforeach
      </ul>
    </div>
    <!--/.nav-collapse -->
  </div>
</div>
