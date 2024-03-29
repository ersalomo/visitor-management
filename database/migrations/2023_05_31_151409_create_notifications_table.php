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
    public function up():void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('con_id')->nullable()->constrained('conversations')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title');
            $table->string('status')->default("unread");
            $table->string('body')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down():void
    {
        Schema::dropIfExists('notifications');
    }
};
