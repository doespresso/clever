<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table) {
			$table->increments('id');
//			$table->string('name', 255);
//			$table->string('alias', 255)->unique();
			$table->text('comment');
			$table->integer('user_id')->unsigned();
			$table->integer('service_id')->unsigned()->nullable();
			$table->smallInteger('published')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}
