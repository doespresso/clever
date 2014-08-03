@if ($articles->count())
<ul class="list-unstyled articles">
  @foreach ($articles as $article)
  <li>
    <div class="row">
      <div class="col-md-3">
        <h3 class="category" role="category"><a href="{{asset('/articles/cat')}}/{{$article->category->alias}}">{{$article->category->name}}</a></h3>
      </div>
      <div class="col-md-9">
        <h3 role="title"><a href="{{asset('articles')}}/{{$article->alias}}">{{$article->name}}</a></h3>
        <p class="announce" role="announce">{{$article->announce}} <a href="{{asset('articles')}}/{{$article->alias}}">Читать</a></p>
      </div>
    </div>
  </li>
  @endforeach
</ul>
{{$articles->links();}}
@endif