<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToCompany extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('companies', function(Blueprint $table)
        {
            $table->string('short_description', 140)->nullable();
            $table->string('long_description', 500)->nullable();
            $table->string('location', 50)->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('companies', function(Blueprint $table)
        {
            $table->dropColumn('short_description');
            $table->dropColumn('long_description');
            $table->dropColumn('location');
        });
	}

}
