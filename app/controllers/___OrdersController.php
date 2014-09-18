<?php

class OrdersController extends BaseController
{


    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }


//    public function index()
//    {
//        $meta_array = array('pagetype' => 'servicepage');
//        $service = Service::where('alias', 'service-egrp')->firstOrFail();
//
////		return View::make('orders.index', compact('orders'));
//        return View::make('services.show', compact('service'))->with($meta_array);
//    }

    public function index()
    {
//        return View::make('orders.new');
        return 'index';
    }


    public function create()
    {
//        return View::make('orders.create');
        $type = Input::get('type') = '123';
//        if(!empty($type)){
//            echo '<b>'.$type.'</b>';
            return View::make('orders.new')->with(array("type"=>$type));
//        }


    }

    public function settings()
    {
        Setting::set('docs',array(
            'egrul'=>[
                'title'=>'Выписка ЕГРП',
                'fields'=>[
                        'name'=>['title'=>'Наименование организации','type'=>'text'],
                        'inn'=>['title'=>'ИНН','type'=>'text'],
                        'ogrn'=>['title'=>'ОГРН','type'=>'text'],
                        'params'=>['title'=>'Срочность и тип доставки', 'type'=>'select',
                            'variants'=>[
                                ['title'=>'Стандартная 2-4 дня','price'=>'1000'],
                                ['title'=>'Стандартная 1-4 дня','price'=>'2000'],
                                ['title'=>'Стандартная 3-4 дня','price'=>'3000'],
                                ['title'=>'Стандартная 4-4 дня','price'=>'4000'],
                                ['title'=>'Стандартная 5-4 дня','price'=>'5000'],
                            ]
                        ],
                ]
            ],
            'egrp'=>[
                'title'=>'Выписка ЕГРП',
                'fields'=>[
                    'address'=>['title'=>'Адрес','type'=>'text'],
                    'number'=>['title'=>'Кадастровый или условный номер','type'=>'text'],
                    'person'=>['title'=>'ФИО','type'=>'text'],
                    'params'=>['title'=>'Срочность и тип доставки','type'=>'select',
                        'variants'=>[
                            ['title'=>'Стандартная 2-4 дня','price'=>'1000'],
                            ['title'=>'Стандартная 1-4 дня','price'=>'2000'],
                            ['title'=>'Стандартная 3-4 дня','price'=>'3000'],
                            ['title'=>'Стандартная 4-4 дня','price'=>'4000'],
                            ['title'=>'Стандартная 5-4 дня','price'=>'5000'],
                        ]
                    ],
                ]
            ],
        ));
        foreach (Setting::get('docs.egrp.fields.params.variants') as $key => $val){
            echo $key;
        }
//        return Setting::get('docs.egrp.title');
    }


    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Order::$rules);

        if ($validation->passes()) {
//            var_dump($input);
            $this->order->create($input);
            return Redirect::route('egrp')->with('message', 'Спасибо за Ваш заказ!');

        }

        return Redirect::route('egrp')
            ->withInput()
            ->withErrors($validation)
            ->with('error-message', 'Форма заполнена с ошибками:');
    }


//	public function show($id)
//	{
//		$order = $this->order->findOrFail($id);
//
//		return View::make('orders.show', compact('order'));
//	}
//
//	/**
//	 * Show the form for editing the specified resource.
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function edit($id)
//	{
//		$order = $this->order->find($id);
//
//		if (is_null($order))
//		{
//			return Redirect::route('orders.index');
//		}
//
//		return View::make('orders.edit', compact('order'));
//	}
//
//	/**
//	 * Update the specified resource in storage.
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function update($id)
//	{
//		$input = array_except(Input::all(), '_method');
//		$validation = Validator::make($input, Order::$rules);
//
//		if ($validation->passes())
//		{
//			$order = $this->order->find($id);
//			$order->update($input);
//
//			return Redirect::route('orders.show', $id);
//		}
//
//		return Redirect::route('orders.edit', $id)
//			->withInput()
//			->withErrors($validation)
//			->with('message', 'There were validation errors.');
//	}
//
//	/**
//	 * Remove the specified resource from storage.
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function destroy($id)
//	{
//		$this->order->find($id)->delete();
//
//		return Redirect::route('orders.index');
//	}

}
