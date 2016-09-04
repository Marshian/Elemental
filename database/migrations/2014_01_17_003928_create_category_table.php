<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Kalnoy\Nestedset\NestedSet;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
//        Schema::create('item_bank_categories', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('title');
//            $table->timestamps();
//            NestedSet::columns($table);
//        });

    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
//        Schema::drop('item_bank_categories');
    }
}
