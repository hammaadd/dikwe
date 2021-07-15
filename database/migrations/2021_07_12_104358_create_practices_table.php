<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practices', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('created_by')->nullable();
            // $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->string('word1',191);
            $table->string('word2',191);
            $table->string('word3',191);
            $table->string('word4',191);
            $table->string('def1',191);
            $table->string('def2',191);
            $table->string('def3',191);
            $table->string('def4',191);  
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
        Schema::dropIfExists('practices');
    }
}
