<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImpromptuTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('impromptu', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('grant_code');
            $table->string('funding_type');
            $table->string('fiscal_year');
            $table->string('program');
            $table->string('short_award_number');
            $table->string('project_string');
            $table->decimal('agency_funded', 10, 2);
            $table->decimal('expended', 10, 2);
            $table->decimal('outstanding_encumbered', 10, 2);
            $table->decimal('total_obligation', 10, 2);
            $table->decimal('award_expended', 10, 2);
            $table->decimal('award_reserve', 10, 2);
            $table->decimal('load_balance', 10, 2);
            $table->decimal('remaining_balance', 10, 2);
		});

        Schema::create('impromptu_old', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('grant_code');
            $table->string('funding_type');
            $table->string('fiscal_year');
            $table->string('program');
            $table->string('short_award_number');
            $table->string('project_string');
            $table->decimal('agency_funded', 10, 2);
            $table->decimal('expended', 10, 2);
            $table->decimal('outstanding_encumbered', 10, 2);
            $table->decimal('total_obligation', 10, 2);
            $table->decimal('award_expended', 10, 2);
            $table->decimal('award_reserve', 10, 2);
            $table->decimal('load_balance', 10, 2);
            $table->decimal('remaining_balance', 10, 2);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('impromptu');
        Schema::drop('impromptu_old');
	}

}
