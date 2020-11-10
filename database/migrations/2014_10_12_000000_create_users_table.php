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
            $table->char('name')->nullable();
            $table->char('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password')->nullable();
            $table->string('profile', 255)->nullable();
            $table->char('type', 1)->nullable();
            $table->char('phone', 20);
            $table->char('address', 255);
            $table->date('dob');
            $table->unsignedBigInteger('create_user_id')->nullable();
            $table->unsignedBigInteger('updated_user_id')->nullable();
            $table->unsignedBigInteger('deleted_user_id');
            $table->rememberToken();
            $table->timestamps();
            $table->datetime('deleted_at');
            $table->foreign('create_user_id')->references('id')->on('users');
            $table->foreign('updated_user_id')->references('id')->on('users');
            $table->foreign('deleted_user_id')->references('id')->on('users');
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
