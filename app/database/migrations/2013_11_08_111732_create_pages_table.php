<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 255);
			$table->string('alias', 255)->unique();
			$table->string('menu', 255)->nullable();
			$table->string('meta-keyword', 255)->nullable();
			$table->string('meta-description', 255)->nullable();
			$table->text('text')->nullable();
			$table->string('icon', 255)->nullable();
			$table->smallInteger('published');
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
		Schema::drop('pages');
	}

}
