<?php

class OrderController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */


    public function index()
    {
        echo "index";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function settings()
    {
        Setting::forget('docs');
        Setting::set('docs', array(
            'egrul' => [
                'title' => 'Выписка ЕГРЮЛ',
                'description' => 'Выписка ЕГРЮЛ',
                'fields' => [
                    'name' => ['title' => 'Наименование организации', 'type' => 'text'],
                    'inn' => ['title' => 'ИНН', 'type' => 'text'],
                    'ogrn' => ['title' => 'ОГРН', 'type' => 'text'],

                    'var' => [
                        'title' => 'Сроки',
                        'par' => [
                            ['title' => 'Стандартная 2-4 дня', 'price' => '5000'],
                            ['title' => 'Стандартная 1-4 дня', 'price' => '2000'],
                            ['title' => 'Стандартная 3-4 дня', 'price' => '3000'],
                            ['title' => 'Стандартная 4-4 дня', 'price' => '4000'],
                            ['title' => 'Стандартная 5-4 дня', 'price' => '5000'],
                        ]
                    ],
                ]
            ],
            'egrp' => [
                'title' => 'Выписка ЕГРП',
                'description' => 'Выписка ЕГРП',
                'fields' => [
                    'address' => ['title' => 'Адрес', 'type' => 'text'],
                    'number' => ['title' => 'Кадастровый или условный номер', 'type' => 'text'],
                    'person' => ['title' => 'ФИО', 'type' => 'text'],
                    'var' => [
                        'title' => 'Сроки',
                        'par' => [
                            ['title' => 'Стандартная 2-4 дня', 'price' => '5000'],
                            ['title' => 'Стандартная 1-4 дня', 'price' => '2000'],
                            ['title' => 'Стандартная 3-4 дня', 'price' => '3000'],
                            ['title' => 'Стандартная 4-4 дня', 'price' => '4000'],
                            ['title' => 'Стандартная 5-4 дня', 'price' => '5000'],
                        ]
                    ],
                ]
            ],
        ));

        return Setting::get('docs.egrul.title');
    }


    public function create()
    {
        $type = Input::get('type');
        $input = Input::all();

        if (!Auth::guest()) {
            if (Session::has('order')) {
                $q = Session::get('order');
//                $question = new Question;
//                $question->question = Session::get('question')['question'];
//                $question->service_id = Session::get('question')['service_id'];
//                $question->user_id = Auth::user()->id;
//                $question->save();
                Session::forget('order');
            }
        }


        if (!empty($type)) {
            $d = Setting::get('docs.' . $type);
            return View::make('orders.order_step1')->with(array("d" => $d, "type" => $type));
        }

    }


    public function store()
    {

        $input = Input::all();
        $type = Input::get('type');
        $d = Setting::get('docs.' . $type);
        $fs = Setting::get('docs.' . $type . '.fields');
        $r = [];
        foreach ($fs as $key => $f) {
            $r[$key] = 'required';
        }
        $r['type'] = 'required';
        $r['fio'] = 'required';
        $r['phone'] = 'required';
        $r['email'] = 'required';

        $validation = Validator::make($input, $r);

        if ($validation->passes()) {


            if (Auth::guest()) {
                $user = new User;
                $user->company = $input['fio'];
                $user->contact = $input['phone'];
                $user->roles = 'user';
                $user->active = 1;
                $user->email = $input['email'];
                $pass = str_random(7);
                $user->password = Hash::make($pass);
                $user->save();
                Auth::loginUsingId($user->id);

                $welcome_message = new Message;
                $welcome_message->user_id = $user->id;
                $welcome_message->message = "Вы успешно зарегистрированы в системе. Надеемся на плодотворное сотрудничество!";
                $welcome_message->save();

                Mail::send('emails.register', array("user"=>$user,"password"=>$pass), function($message)
                {   $message->from(Setting::get('adminmail'), 'Администрация '.Setting::get('site_name'));
                    $message->to(Auth::user()->email,'Пользователь '.Auth::user()->company)->subject('Регистрация в системе '.Setting::get('site_name'));
                });


            }
            else{
                $user = Auth::user();
            }

            $order = new Order;
            $info='';
            foreach ($fs as $key => $f) {
                $info .= $fs[$key]['title'].': '.$input[$key].PHP_EOL;
            }
            $order->info = $info;
            $order->type = Setting::get('docs.' . $type.'.title');
            $order->delivery = $input['var'];
            $order->fio = $input['fio'];
            $order->phone = $input['phone'];
            $order->email = $input['email'];

            $user->orders()->save($order);



            return Response::json(array('status' => 'ok','order_id'=>$order->id));

        }
        return Response::json(array('status' => 'error'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
//    public function show($id)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int $id
//     * @return Response
//     */
//    public function edit($id)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  int $id
//     * @return Response
//     */
//    public function update($id)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int $id
//     * @return Response
//     */
//    public function destroy($id)
//    {
//        //
//    }

}