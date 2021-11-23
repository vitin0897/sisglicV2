<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToLicencasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sisglic')->table('licencas', function (Blueprint $table) {
            $table->unsignedBigInteger('software_id');
            $table->unsignedBigInteger('tipo_id');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('computador_id');

            $table->foreign('software_id')->references('id')->on('softwares');
            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('computador_id')->references('id')->on('computadores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('sisglic')->table('licencas', function (Blueprint $table) {
            $table->foreign('software_id')->onDelete('cascade');
            $table->foreign('tipo_id')->onDelete('cascade');
            $table->foreign('status_id')->onDelete('cascade');
            $table->foreign('computador_id')->onDelete('cascade');
        });
    }
}
