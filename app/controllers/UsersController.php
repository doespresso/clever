<?php

class UsersController extends BaseController {

	protected $user;
	public function __construct(User $user)
	{
		$this->user = $user;
	}

    public function cabinet()
    {
        $user = Auth::user();
        $messages= $user->messages()->orderby('isnew','updated_at')->paginate(10);
        return View::make('cabinet.index')->with(array("user"=>$user,"messages"=>$messages,"pagetype"=>"listingpage"));
    }


}
