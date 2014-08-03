<?php

class RolesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('roles')->truncate();

		$roles = array(
            array(
                "name"=>"admin",
                "active"=>1,
            ),
            array(
                "name"=>"user",
                "active"=>1,
            ),
		);

		// Uncomment the below to run the seeder
		DB::table('roles')->insert($roles);
	}

}
