<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApikeyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('api_keys', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->unsigned()->unique('user_id', 'api_keys_user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('api_key');
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
		Schema::drop('api_keys');
	}

}
