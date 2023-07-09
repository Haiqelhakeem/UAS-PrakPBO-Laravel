<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('username');
            $table->string('password');
            $table->string('no_rekening');
        });

        // Schema::create('balance', function (Blueprint $table) {
        //     $table->increments('id_balance');
        //     $table->integer('id_user')->unsigned();
        //     $table->integer('balance');
        //     $table->integer('keluarTransfer');
        //     $table->integer('masukTransfer');

        //     $table->foreign('id_user')->references('id_user')->on('users');
        //     //$table->timestamps();
        // });

        // Schema::create('history', function (Blueprint $table) {
        //     $table->increments('id_history');
        //     $table->integer('id_user')->unsigned();
        //     $table->string('recipient');
        //     $table->integer('amount');
        //     $table->string('date');

        //     $table->foreign('id_user')->references('id_user')->on('users');
        //     //$table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
