<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('RolesTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('ServicesTableSeeder');
//		$this->call('PagesTableSeeder');
		$this->call('QuestionsTableSeeder');
		$this->call('CommentsTableSeeder');
		$this->call('MessagesTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('ArticlesTableSeeder');
		$this->call('OrdersTableSeeder');
	}

}