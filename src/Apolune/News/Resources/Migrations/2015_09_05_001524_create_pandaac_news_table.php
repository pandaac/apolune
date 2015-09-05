<?php

namespace Apolune\News\Resources\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePandaacNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__pandaac_news', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['news', 'article', 'ticker'])->default('news');
            $table->enum('icon', [null, 'staff', 'community', 'development', 'support', 'technical'])->default('community');
            $table->string('title');
            $table->text('content')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
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
        Schema::drop('__pandaac_news');
    }
}
