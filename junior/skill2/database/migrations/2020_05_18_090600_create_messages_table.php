<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    // php artisan migrate --path=/database/migrations/2020_05_18_090600_create_messages_table.php
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('receiver')->nullable();
            $table->string('subject')->nullable();
            $table->string('message')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->integer('account_id')->nullable();
            $table->integer('deleted_at')->default(0);

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
