<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('messages', function (Blueprint $table) {
        $table->id();
        $table->timestamps();
        $table->text('message');
        $table->string('photo')->nullable();
        $table->string('token')->unique();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::dropIfExists('messages');
}
};
