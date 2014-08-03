<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('users')->truncate();

		$users = array(
            array(
                "email"=>"in@segmental.ru",
                "company"=>"CLEVER",
                "contact"=>"13123123213",
                "email"=>"in@segmental.ru",
                "password"=>Hash::make('1234'),
                "roles"=>"admin",
            ),
            array(
                "email"=>"user@sergmental.ru",
                "company"=>'ООО "Вазген"',
                "contact"=>"13123123213",
                "password"=>Hash::make('12345'),
                "roles"=>"user",
            ),
		);

		// Uncomment the below to run the seeder
		DB::table('users')->insert($users);
	}

}
