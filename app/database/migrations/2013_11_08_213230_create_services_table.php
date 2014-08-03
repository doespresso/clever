<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServicesTable extends Migration {


	public function up()
	{
		Schema::create('services', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 255);
			$table->string('alias', 255)->unique();
			$table->string('announce', 255)->nullable();
			$table->string('meta_title', 255)->nullable();
			$table->string('meta_description', 255)->nullable();
			$table->string('meta_keywords', 255)->nullable();
			$table->text('products')->nullable();
			$table->text('solutions')->nullable();
			$table->text('specials')->nullable();
			$table->string('icon', 255)->nullable();
			$table->string('icon_1', 255)->nullable();
			$table->string('icon_2', 255)->nullable();
			$table->string('color', 255)->nullable();
			$table->smallInteger('sort')->nullable()->default(10);
			$table->smallInteger('published')->default(0);
			$table->timestamps();
		});
	}


	public function down()
	{
		Schema::drop('services');
	}

}
