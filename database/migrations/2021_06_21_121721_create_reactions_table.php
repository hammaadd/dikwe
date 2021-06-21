<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ka');
            // $table->unsignedBigInteger('note')->nullable();
            // $table->foreign('note')->references('id')->on('notes')->onDelete('set null');
            $table->unsignedBigInteger('reacted_by')->nullable();
            $table->foreign('reacted_by')->references('id')->on('users')->onDelete('set null');
            $table->enum('ka_type',['note','bookmark','tag','workspace','shorturl']);
            $table->enum('reaction_type',['like','dislike','upvote','copied','shared']);
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
        Schema::dropIfExists('reactions');
    }
}
