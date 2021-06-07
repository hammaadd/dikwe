<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('note')->nullable();
            $table->foreign('note')->references('id')->on('notes')->onDelete('set null');
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
        Schema::dropIfExists('notes_tags');
    }
}
