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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password');
            $table->string('profile', 255);
            $table->string('type', 1)->default(1);
            $table->string('phone', 20)->nullable();
            $table->string('address', 255)->nullable();
            $table->date('dob')->nullable();
            $table->unsignedBigInteger('create_user_id');
            $table->unsignedBigInteger('updated_user_id');
            $table->unsignedBigInteger('deleted_user_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();
            $table->foreign('create_user_id')->references('id')->on('users')->onDelete ('cascade');
            $table->foreign('updated_user_id')->references('id')->on('users')->onDelete ('cascade');
            $table->foreign('deleted_user_id')->references('id')->on('users')->onDelete ('cascade');
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
