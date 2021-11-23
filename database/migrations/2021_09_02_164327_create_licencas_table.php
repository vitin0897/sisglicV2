<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicencasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sisglic')->create('licencas', function (Blueprint $table) {
            $table->id();
            $table->string('serial');
            $table->string('key')->nullable();
            $table->integer('autorizacaoDeUso')->nullable();
            $table->string('numeroEmpenho')->nullable();
            $table->string('anexo')->nullable();
            $table->longText('observacao')->nullable();
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
        Schema::connection('sisglic')->dropIfExists('licencas');
    }
}
