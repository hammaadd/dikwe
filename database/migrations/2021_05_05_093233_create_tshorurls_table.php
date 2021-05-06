<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTshorurlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tshorurls', function (Blueprint $table) {
            $table->id();
            $table->string('title',191);
            $table->string('color',191)->nullable();
            $table->unsignedBigInteger('ka_id')->nullable();
            $table->foreign('ka_id')->references('id')->on('d_knowledge_assets')->onDelete('set null');
            $table->text('source_url');
            $table->text('short_url');
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
        Schema::dropIfExists('tshorurls');
    }
}
