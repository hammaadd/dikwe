<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_spaces', function (Blueprint $table) {
            $table->id();
            $table->string('title',191);
            $table->string('thumbnail',191)->nullable();
            $table->unsignedBigInteger('parent')->nullable();
            $table->foreign('parent')->references('id')->on('work_spaces')->onDelete('set null');
            $table->enum('visiability',['public','private','restricted']);
            $table->enum('status',['active','inactive']);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('work_spaces');
    }
}
