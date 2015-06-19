<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFundingSourcesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('funding_sources', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('fiscal_year');
            $table->string('type_of_funding');
            $table->string('slug');
            $table->decimal('funded',10,2);
            $table->decimal('spent',10,2);
            $table->decimal('obligated',10,2);
            $table->decimal('impact_fee',10,2);
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
		Schema::drop('funding_sources');
	}

}
