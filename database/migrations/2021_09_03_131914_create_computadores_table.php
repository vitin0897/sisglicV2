<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sisglic')->create('computadores', function (Blueprint $table) {
            $table->id();
            $table->integer("glpi_id");
            $table->string("name");
            $table->string("otherserial");
            $table->string("colaboradorfield");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('sisglic')->dropIfExists('computadores');
    }
}
