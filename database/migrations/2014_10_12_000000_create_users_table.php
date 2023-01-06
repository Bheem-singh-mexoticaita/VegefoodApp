<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('phoneNumber')->nullable();
            $table->enum('gender', ['Male', 'Female']);
            $table->date('DOB')->nullable();
            $table->string('Bio')->nullable();
            $table->string('Address')->nullable();
            $table->integer('type')->nullable();
            $table->string('street2')->nullable();
            $table->string('state_code')->nullable();
            $table->string('City')->nullable();
            $table->text('zip')->nullable();
            $table->string('country')->nullable();
            $table->softDeletes()->nullable();
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
};
