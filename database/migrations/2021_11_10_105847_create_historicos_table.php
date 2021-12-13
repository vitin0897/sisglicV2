<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sisglic')->create('historicos', function (Blueprint $table) {
            $table->id();
            $table->string("usuario")->nullable();
            $table->string("lic_antigo")->nullable();
            $table->string("lic_atual")->nullable();
            $table->string("pat_antigo")->nullable();
            $table->string("pat_atual")->nullable();
            $table->string("hora_acao")->nullable();
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
        Schema::dropIfExists('historicos');
    }
}
