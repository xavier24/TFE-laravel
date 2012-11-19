<?php

class Annonces {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
           Schema::create('annonces',function($table){
               $table->increments('id');
               $table->string('depart',100);
               $table->string('arrivee',100);
               $table->date('date');
               $table->timestamp('heure');
               $table->decimal('flexibilite',2,0);
               $table->boolean('conducteur');
               $table->boolean('fumeur');
               $table->boolean('bagage');
               $table->boolean('animaux');
               $table->boolean('discussion');
               $table->boolean('musique');
               $table->decimal('places',2,0);
               $table->integer('user_id');
               $table->timestamps();
            });
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('annonces');
	}

}