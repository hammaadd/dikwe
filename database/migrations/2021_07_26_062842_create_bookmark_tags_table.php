<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookmarkTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookmark_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bookmark')->nullable();
            $table->foreign('bookmark')->references('id')->on('book_marks')->onDelete('set null');
            $table->unsignedBigInteger('tag')->nullable();
            $table->foreign('tag')->references('id')->on('tags')->onDelete('set null');
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
        Schema::dropIfExists('bookmark_tags');
    }
}
