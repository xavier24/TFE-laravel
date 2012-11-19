<?php

class Users {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('users',function($table){
               $table->increments('id');
               $table->string('username',20);
               $table->string('email');
               $table->string('password');
               $table->boolean('conducteur');
               $table->boolean('fumeur');
               $table->boolean('bagage');
               $table->boolean('animaux');
               $table->boolean('discussion');
               $table->boolean('musique');
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
            Schema::drop('users');
	}

}