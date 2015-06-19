<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWatsonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('watson', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('short_award_number');
            $table->string('name');
            $table->decimal('budget', 10, 2);
            $table->string('status');
            $table->date('start_date');
            $table->date('end_date');
		});

        Schema::create('watson_countries', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('short_award_number');
            //$table->foreign('short_award_number')->references('short_award_number')->on('watson');
            $table->integer('country_id')->unsigned()->index();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('watson_countries');
        Schema::drop('watson');
	}

}
