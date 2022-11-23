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
            // Penanggung Jawab
            $table->string('name');
            $table->string('gender');
            $table->text('address');
            $table->string('phone');
            $table->string('image')->default('default.png');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('is_active')->default(0);
            $table->integer('role')->default(2);
            // Orang Dalam Demensia
            $table->string('odd_name');
            $table->string('odd_gender');
            $table->integer('odd_age');
            $table->string('odd_stage');
            $table->text('odd_description');
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
