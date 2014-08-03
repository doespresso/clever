<?php

class ServicesController extends BaseController {

	/**
	 * Service Repository
	 *
	 * @var Service
	 */
	protected $service;

	public function __construct(Service $service)
	{
		$this->service = $service;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$services = $this->service->Publishedsorted()->get();//->published();
		return View::make('services.homepage-list', compact('services'))->with('pagetype','homepage');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Service::$rules);

		if ($validation->passes())
		{
			$this->service->create($input);

			return Redirect::route('services.index');
		}

		return Redirect::route('services.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $meta_array = array('pagetype'=>'servicepage');
		$service = $this->service->where('alias',$id)->firstOrFail();
        if (isset($service->meta_title)) $meta_array['meta_title']=$service->meta_title;
        if (isset($service->meta_keywords)) $meta_array['meta_keywords']=$service->meta_keywords;
        if (isset($service->meta_description)) $meta_array['meta_description']=$service->meta_description;
//        return var_dump($meta_array);
		return View::make('services.show', compact('service'))->with($meta_array);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */


}
