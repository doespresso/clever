<?php
class LoginController extends BaseController {
//$this->filter('after','store_question')->only(array('login','store'));
    /**
     * Login Form.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('login.index')->with('pagetype','contentpage');
    }

    /**
     * Registration form.
     *
     * @return Response
     */
    public function register()
    {
        return View::make('login.register')->with('pagetype','contentpage');
    }

    /**
     * Registring new user and storing him to DB.
     *
     * @return Response
     */
    public function store()
    {
//        $rules = array(
//            'email' 	=> 'required|email|unique:users,email',
//            'password' 	=> 'required|alpha_num|between:4,50',
//        );

        $validator = Validator::make(Input::all(), User::$rules);

        if($validator->fails()){
            return Redirect::back()->withInput()->withErrors($validator);
        }

        $user = new User;
        $user->email = Input::get('email');
        $user->company = Input::get('company');
        $user->contact = Input::get('contact');
        $user->password = Hash::make(Input::get('password'));
        $user->save();

        Auth::loginUsingId($user->id);
        if (!Auth::guest()) {
            if (Session::has('question')){
                  $q = Session::get('question');
                $question = new Question;
                $question->question = Session::get('question')['question'];
                $question->service_id = Session::get('question')['service_id'];
                $question->user_id = Auth::user()->id;
                $question->save();
                Session::forget('question');
            }
        }
        $welcome_message = new Message;
        $welcome_message->user_id = $user->id;
        $welcome_message->message = "Вы успешно зарегистрированы в системе. Надеемся на плодотворное сотрудничество!";
        $welcome_message->save();

        Mail::send('emails.register', array("user"=>$user,"password"=>Input::get('password')), function($message)
        {   $message->from(Setting::get('adminmail'), 'Администрация '.Setting::get('site_name'));
            $message->to(Auth::user()->email,'Пользователь '.Auth::user()->company)->subject('Регистрация в системе '.Setting::get('site_name'));
        });

        return Redirect::route('home')->with('message', 'Спасибо за регистрацию');
    }


    /**
     * Log in to site.
     *
     * @return Response
     */
    public function login()
    {
        if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')), true)) {
            if (!Auth::guest()) {
                if (Session::has('question')){
                      $q = Session::get('question');
                    $question = new Question;
                    $question->question = Session::get('question')['question'];
                    $question->service_id = Session::get('question')['service_id'];
                    $question->user_id = Auth::user()->id;
                    $question->save();
                    Session::forget('question');
                }
            }
            return Redirect::intended('../cabinet');
        }

       return Redirect::back()->withInput(Input::except('password'))->withErrors("Неверно указаны логин и пароль");

    }


    /**
     * Log out from site.
     *
     * @return Response
     */
    public function logout()
    {
        Auth::logout();

        return Redirect::intended('../cabinet')->with('message', 'Вы вышли из системы');
    }

}
