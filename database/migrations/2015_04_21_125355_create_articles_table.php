<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->string('img');
            $table->string('slug');
            $table->timestamp('publish_date');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');//foreign key declaration
            $table->boolean('deleted');
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
		Schema::drop('articles');
	}

}
