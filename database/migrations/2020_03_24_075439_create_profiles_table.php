<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('alias');
            $table->string('initial');
            $table->boolean('gender');
            $table->enum('religion', ['ISLAM', 'HINDU', 'BUDDHA', 'CRISTIAN', 'CATHOLIC']);
            $table->enum('marital', ['SINGLE', 'MARRIED', 'DIVORCED']);
            $table->string('citizenship');
            $table->string('number_personnel');
            $table->string('number_citizen');
            $table->string('number_taxpayer');
            $table->string('number_passport');
            $table->string('birthplace');
            $table->date('birthday');
            $table->integer('weight');
            $table->integer('height');
            $table->integer('size_shoes');
            $table->integer('size_shirt');
            $table->integer('size_pants');
            $table->string('blood');
            $table->string('eyes');
            $table->string('rhesus');
            $table->string('website');
            $table->timestamps();
        });

        Schema::table('users_profiles', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_profiles');
    }
}
