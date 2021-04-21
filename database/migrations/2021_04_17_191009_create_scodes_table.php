<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scodes', function (Blueprint $table) {
            $table->id();
            $table->string('key',191);
            $table->string('value',191);
            $table->enum('status',['0','1'])->default('1');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->softDeletes();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('scodes');
    }
}
