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
            $table->integer('package_id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('phone');
            $table->date('birthdate');
            $table->integer('level')->default(0);
            $table->integer('commission')->default(0);
            $table->integer('price')->default(0);
            $table->integer('points')->default(0);
            $table->string('referral_code');
            $table->string('email')->unique();
            $table->string('address');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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