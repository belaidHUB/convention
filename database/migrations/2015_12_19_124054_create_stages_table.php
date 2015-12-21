<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStagesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nom');
			$table->string('prenom');
			$table->string('cne');
			$table->string('organisme');
			$table->string('adresse');
			$table->string('tel_org');
			$table->string('portable');
			$table->integer('periode');
			$table->date('debut');
			$table->date('fin');
			$table->string('etat');
			$table->string('type');
			$table->string('assurances');
			$table->string('email');
			$table->string('formation');
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
		Schema::drop('stages');
	}

}
