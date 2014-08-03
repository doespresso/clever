<?php

class MessagesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('messages')->truncate();

        $messages = array(
            array(
                "message" => "Lorem Ipsum - это текст, часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной рыбой для текстов на латинице с начала XVI века.",
                "user_id" => 2,
                "created_at" => DB::raw('NOW()'),"updated_at" => DB::raw('NOW()')
            ),
            array(
                "message" => "Lorem Ipsum - это текст, часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной рыбой для текстов на латинице с начала XVI века.",
                "user_id" => 2,
                "created_at" => DB::raw('NOW()'),"updated_at" => DB::raw('NOW()')
            ),
            array(
                "message" => "Lorem Ipsum - это текст, часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной рыбой для текстов на латинице с начала XVI века.",
                "user_id" => 2,
                "created_at" => DB::raw('NOW()'),"updated_at" => DB::raw('NOW()')
            ),
            array(
                "message" => "Lorem Ipsum - это текст, часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной рыбой для текстов на латинице с начала XVI века.",
                "user_id" => 2,
                "created_at" => DB::raw('NOW()'),"updated_at" => DB::raw('NOW()')
            ),
        );

		// Uncomment the below to run the seeder
		DB::table('messages')->insert($messages);
	}

}