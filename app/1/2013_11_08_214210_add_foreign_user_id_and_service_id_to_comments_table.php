<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignUserIdAndServiceIdToCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comments', function(Blueprint $table) {
            $table->index('user_id');
//            $table->Index('service_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('comments', function(Blueprint $table) {
			$table->dropForeign('comments_user_id_foreign');
//			$table->dropForeign('comments_service_id_foreign');
            $table->dropIndex('comments_user_id_index');
//            $table->dropIndex('comments_service_id_index');
		});
	}

}
