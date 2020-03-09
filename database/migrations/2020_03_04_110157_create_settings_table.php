<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->string('phone');
			$table->string('email');
			$table->string('facebook');
			$table->string('twitter');
			$table->string('insta');
			$table->string('youtube');
			$table->string('about_app');
			$table->text('notification_text');
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}