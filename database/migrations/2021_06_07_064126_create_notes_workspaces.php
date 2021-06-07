<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesWorkspaces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes_workspaces', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('note')->nullable();
            $table->foreign('note')->references('id')->on('notes')->onDelete('set null');
            $table->unsignedBigInteger('workspace')->nullable();
            $table->foreign('workspace')->references('id')->on('workspaces')->onDelete('set null');
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
        Schema::dropIfExists('notes_workspaces');
    }
}
