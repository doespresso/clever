<?php

class CategoriesController extends BaseController {


	protected $category;

	public function __construct(Category $category)
	{
		$this->category = $category;
	}

	public function index()
	{
		$categories = $this->category->all();

		return View::make('categories.index', compact('categories'));
	}


	public function show($id)
	{
		$category = $this->category->findOrFail($id);

		return View::make('categories.show', compact('category'));


        $meta_array = array('pagetype'=>'servicepage');
		$service = $this->service->where('alias',$id)->firstOrFail();
        if (isset($service->meta_title)) $meta_array['meta_title']=$service->meta_title;
        if (isset($service->meta_keywords)) $meta_array['meta_keywords']=$service->meta_keywords;
        if (isset($service->meta_description)) $meta_array['meta_description']=$service->meta_description;
//        return var_dump($meta_array);
		return View::make('services.show', compact('service'))->with($meta_array);
	}


}
