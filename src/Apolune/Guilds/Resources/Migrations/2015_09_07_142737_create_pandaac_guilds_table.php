<?php

namespace Apolune\Guilds\Resources\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePandaacGuildsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__pandaac_guilds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('guild_id');
            $table->foreign('guild_id')->references('id')->on('guilds')->onDelete('cascade');
            $table->string('description', 500)->nullable()->default(null);
            $table->string('logo')->nullable()->default(null);
            $table->integer('house_id')->nullable()->default(null);
            $table->foreign('house_id')->references('id')->on('houses')->onDelete('cascade');
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
        Schema::drop('__pandaac_guilds');
    }
}
