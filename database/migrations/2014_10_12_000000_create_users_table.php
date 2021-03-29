<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',191);
            $table->string('email',191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',191);
            $table->string('firstname',191)->nullable();
            $table->string('lastname',191)->nullable();
            $table->enum('status',['A','D','S'])->default('A');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->enum('gender',['Male','Female','Other'])->nullable();
            $table->string('profile_img',191)->nullable();
            $table->string('phone_no',191)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
