<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('linkendConnected_id')->nullable();
            $table->string('clientOid', 500)->nullable();
            $table->decimal('price', 8,8)->nullable();
            $table->decimal('size', 8,8)->nullable();
            $table->string('symbol', 500)->nullable();
            $table->string('type', 500)->nullable();
            $table->string('side', 500)->nullable();
            $table->string('remark', 500)->nullable();
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
        Schema::dropIfExists('logs');
    }
}
