<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function ($table)
		{
			$table->increments('id');
			$table->string('title', 150);
			$table->string('slug', 150)->unique();
			$table->integer('category_id')->default(0);
			$table->longText('content_raw')->nullable();
			$table->longText('content_html')->nullable();
			$table->boolean('featured')->default(false);
			$table->char('status')->default(1);
			$table->string('language', 6)->default('en');
			$table->string('meta_title', 150)->nullable();
			$table->string('meta_description')->nullable();
			$table->integer('created_by')->default(0);
			$table->integer('updated_by')->nullable();
			$table->integer('published_by')->nullable();
			$table->timestamps();
			$table->dateTime('published_at')->nullable();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('posts');
	}

}
