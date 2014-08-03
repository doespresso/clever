<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
	protected $guarded = array();


    protected $hidden = array('password');


   	public function getAuthIdentifier()
   	{
   		return $this->getKey();
   	}

   	public function getAuthPassword()
   	{
   		return $this->password;
   	}


   	public function getReminderEmail()
   	{
   		return $this->email;
   	}

	public static $rules = array(
		'email' => 'Required|email|unique:users',
		'password' => 'Required|AlphaNum|Between:3,38|Confirmed',
        'password_confirmation' =>'Required|AlphaNum|Between:3,38',
//		'name' => 'required',
		'company' => 'required',
		'contact' => 'required',
//		'adress' => 'required',
//		'type' => 'required',
//		'active' => 'required'
	);




    public function hasRole($name)
    {
        $user_roles=explode(',',$this->roles);
        return is_int(array_search($name,$user_roles));
    }

    public function messages(){
        return $this->hasMany('Message');
    }
}
