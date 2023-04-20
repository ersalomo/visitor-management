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
        // bersifat jika sudah berapa di kawasan perusahaan  / offline
        // di approved dari tb appoinment maka data akan di insert disini
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_appmt')
                /**
                 * nullable berlaku jika visitor
                 * tiba-tiba datang(offline) / mendadak
                 * tanpa membuat appointment terlebih dahulu
                 * niminal daftar dulu
                */
                ->nullable()
                ->constrained('appointments');
                $table->date('visit_date');
                $table->boolean('checkin');
                $table->boolean('checkout');
                $table->string('notes')->nullable();
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
        Schema::dropIfExists('visits');
    }
};