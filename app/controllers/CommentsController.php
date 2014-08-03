<?php

class CommentsController extends BaseController {

	/**
	 * Comment Repository
	 *
	 * @var Comment
	 */
	protected $comment;

	public function __construct(Comment $comment)
	{
		$this->comment = $comment;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
//		$comments = $this->comment->where('published','>','0')->paginate(10);
		$comments = $this->comment->where('published','>','0')->orderby('created_at','desc')->with('user')->paginate(10);
		return View::make('comments.index', compact('comments'))->with('pagetype','listingpage');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
//	public function create()
//	{
//		return View::make('comments.create');
//	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
        $user_id = Auth::user()->id;
        $input['user_id']=$user_id;
		$validation = Validator::make($input, Comment::$rules);

		if ($validation->passes())
		{
			$this->comment->create($input);

			return Redirect::route('comments.index')->with('message','Благодарим Вас за отзыв о нашей работе! Надеемся на дальнейшее плодотворное сотрудничество.');;
		}

        return Redirect::route('comments.index')->withInput()->withErrors($validation)->with('error-message','Форма заполнена с ошибками');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$comment = $this->comment->findOrFail($id);

		return View::make('comments.show', compact('comment'));
	}

}
