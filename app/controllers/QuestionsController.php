<?php

class QuestionsController extends BaseController {

	/**
	 * Question Repository
	 *
	 * @var Question
	 */
	protected $question;

	public function __construct(Question $question)
	{
		$this->question = $question;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$questions = $this->question->whereNotNull('answer')->where('published','1')->orderby('created_at','desc')->paginate(10);
//        $questions = DB::table('questions')->whereNull('answer')->get();
//        var_dump($questions);

		return View::make('questions.index', compact('questions'))->with('pagetype','questionspage');
	}

    public function category($id=0)
   	{
           if ($id>0 && ($service_filter = Service::find($id))) {
               $questions = $this->question->where('service_id', $id)->whereNotNull('answer')->where('published', '1')->orderby('created_at', 'desc')->paginate(10);
           } else {
               return Redirect::route('questions.index');
           }
   		return View::make('questions.index', compact('questions'))->with(array('cat'=>$service_filter,'pagetype'=>'questionspage'));
   	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
//	public function create()
//	{
//        return Redirect::route('questions.index');
//	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $contact_rules = array(
        		'q_company' => 'required|min:3|max:60',
        		'q_email' => 'required|email',
        		'q_tel' => 'required|min:7|max:12',
        	);
		$input = Input::all();
        if(Auth::check()){
            $validation = Validator::make($input, Question::$rules);
        }
        else{
           $qrules = array_merge(Question::$rules,$contact_rules);
           $validation = Validator::make($input, $qrules);
        }


		if ($validation->passes())
		{
            if(Auth::check()){
            $input['user_id']= Auth::user()->id;
            $input['q_company']= Auth::user()->company;
            $input['q_email']= Auth::user()->email;
            $input['q_tel']= Auth::user()->contact;
            $this->question->create($input);
            }
            else
            {
//                Session::put('question',Input::all());
//                return View::make('login.havequestion')->with('pagetype','listingpage');
            $input['user_id']= 0;
            $this->question->create($input);
            }
			return Redirect::route('questions.index')->with('message','Спасибо! Ваш вопрос сохранен и будет опубликован в разделе, как только наш специалист даст на него ответ.');
		}

		return Redirect::route('questions.index')->withInput()->withErrors($validation)->with('error-message','Форма заполнена с ошибками');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$question = $this->question->findOrFail($id);

		return View::make('questions.show', compact('question'));
	}




}
