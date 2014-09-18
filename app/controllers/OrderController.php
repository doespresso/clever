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

//    public function settings()
//    {
//        Setting::forget('docs');
//        Setting::set('docs', array(
//            'egrul' => [
//                'title' => 'Выписка ЕГРЮЛ',
//                'description' => 'Выписка ЕГРЮЛ',
//                'fields' => [
//                    'name' => ['title' => 'Наименование организации', 'type' => 'text'],
//                    'inn' => ['title' => 'ИНН', 'type' => 'text'],
//                    'ogrn' => ['title' => 'ОГРН', 'type' => 'text'],
//
//                    'var' => [
//                        ['title' => 'Стандартная 2-4 дня', 'price' => '5000'],
//                        ['title' => 'Стандартная 1-4 дня', 'price' => '2000'],
//                        ['title' => 'Стандартная 3-4 дня', 'price' => '3000'],
//                        ['title' => 'Стандартная 4-4 дня', 'price' => '4000'],
//                        ['title' => 'Стандартная 5-4 дня', 'price' => '5000'],
//                    ],
//                ]
//            ],
//            'egrp' => [
//                'title' => 'Выписка ЕГРП',
//                'description' => 'Выписка ЕГРП',
//                'fields' => [
//                    'address' => ['title' => 'Адрес', 'type' => 'text'],
//                    'number' => ['title' => 'Кадастровый или условный номер', 'type' => 'text'],
//                    'person' => ['title' => 'ФИО', 'type' => 'text'],
//                    'var' => [
//                        ['title' => 'Стандартная 2-4 дня', 'price' => '5000'],
//                        ['title' => 'Стандартная 1-4 дня', 'price' => '2000'],
//                        ['title' => 'Стандартная 3-4 дня', 'price' => '3000'],
//                        ['title' => 'Стандартная 4-4 дня', 'price' => '4000'],
//                        ['title' => 'Стандартная 5-4 дня', 'price' => '5000'],
//                    ],
//                ]
//            ],
//        ));
//
//        return Setting::get('docs.egrul.title');
//    }




    public function create()
    {
        $type = Input::get('type');
        echo "create";
        var_dump(Input::all());
        if (!empty($type)) {
            $d = Setting::get('docs.' . $type);
            return View::make('orders.order_step1')->with(array("d" => $d,"type"=>$type));
        }
    }




    public function store()
    {
        var_dump(Input::all());
        return Redirect::route('order.start')->withInput(Input::all());
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