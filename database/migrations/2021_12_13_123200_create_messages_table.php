<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('body');
            $table->timestamps();

            //Foreign Keys
            $table->unsignedBigInteger('from');
            $table->foreign('from', 'fk_message_users')
            ->on('users')
            ->references('Id')
            ->onDelete('cascade');

            $table->unsignedBigInteger('partyId');
            $table->foreign('partyId', 'fk_message_partys')
            ->on('partys')
            ->references('Id')
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
        Schema::dropIfExists('messages');
    }
}
