<?php

class ArticlesController extends BaseController {

	/**
	 * Article Repository
	 *
	 * @var Article
	 */
	protected $article;

	public function __construct(Article $article)
	{
		$this->article = $article;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $meta_array = array('pagetype'=>'articlepage');
        $articles = $this->article->whereNotNull('name')->where('published','1')->orderby('created_at','desc')->paginate(10);
		return View::make('articles.index', compact('articles'))->with($meta_array);
	}

    public function category($id)
   	{
           $meta_array = array('pagetype'=>'articlepage');
           if (isset($id)) {
               $articles = Category::where('alias',$id)->firstOrFail()->articles()->where('published','=','1')->orderby('created_at','desc')->paginate(10);
           } else {
               return Redirect::route('articles.index');
           }
   		return View::make('articles.index', compact('articles'))->with($meta_array);
   	}


	public function show($id)
	{
        $meta_array = array('pagetype'=>'articlepage');
        $article = $this->article->where('alias', $id)->whereNotNull('name')->where('published', '1')->firstOrFail();
        if (isset($article->meta_title)) $meta_array['meta_title']=$article->meta_title;
        if (isset($article->meta_keywords)) $meta_array['meta_keywords']=$article->meta_keywords;
        if (isset($article->meta_description)) $meta_array['meta_description']=$article->meta_description;
		return View::make('articles.show', compact('article'))->with($meta_array);
	}




}
