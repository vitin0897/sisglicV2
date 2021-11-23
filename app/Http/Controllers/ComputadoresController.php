<?php

namespace App\Http\Controllers;

use App\Models\ColaboradoresGlpi;
use App\Models\Computadores;
use App\Models\ComputadoresGlpi;
use App\Models\Historico;
use App\Models\User;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\DB;

class ComputadoresController extends Controller
{
    public function listComputadores()
    {
        // Retorna linhas de computadores do GLPI
        $row_glpi_computers = ComputadoresGlpi::all()->count();

        // Retorna linhas de colaboradores do GLPI
        $row_glpi_plugin_fields_computerutilizadors = ColaboradoresGlpi::all()->count();

        // Retorna linhas de computadores do SISGLIC
        $row_computadores = Computadores::all()->count();

        $computadoresGlpi = ComputadoresGlpi::all();
        $colaboradoresGlpi = ColaboradoresGlpi::all();
        $comps = Computadores::all();

        while ($row_computadores < $row_glpi_computers) {
            $a = $computadoresGlpi[$row_computadores]->id;
            $b = $computadoresGlpi[$row_computadores]->name;
            $c = $computadoresGlpi[$row_computadores]->otherserial;
            //////////////////////////////////////////////////
            for ($i = 0; $i < $row_glpi_plugin_fields_computerutilizadors; $i++) {
                if ($colaboradoresGlpi[$i]->items_id == $a) {
                    $d = $colaboradoresGlpi[$i]->colaboradorfield;
                    $i = $row_glpi_plugin_fields_computerutilizadors;
                } else {
                    $d = "";
                }
            }

            Computadores::insert(
                [
                    'glpi_id' => $a,
                    'name' => $b,
                    'otherserial' => $c,
                    'colaboradorfield' => $d
                ]
            );

            // Retorna linhas de computadores do GLPI
            $row_glpi_computers = ComputadoresGlpi::all()->count();

            // Retorna linhas de colaboradores do GLPI
            $row_glpi_plugin_fields_computerutilizadors = ColaboradoresGlpi::all()->count();

            // Retorna linhas de computadores do SISGLIC
            $row_computadores = Computadores::all()->count();

            $computadoresGlpi = ComputadoresGlpi::all();
            $colaboradoresGlpi = ColaboradoresGlpi::all();
            $comps = Computadores::all();
        }

        $comps = Computadores::all();

        return view('/computadores', ['comps' => $comps]);
    }

    ///////////////////////////////////////////////////////////////////////////////////////////

    public function atualizaComputador()
    {
        $sqlQuery = "SET FOREIGN_KEY_CHECKS = 0";
        DB::select(DB::raw($sqlQuery));

        DB::table('computadores')->truncate();

        $sqlQuery = "SET FOREIGN_KEY_CHECKS = 1";
        DB::select(DB::raw($sqlQuery));

        // Retorna linhas de computadores do GLPI
        $row_glpi_computers = ComputadoresGlpi::all()->count();

        // Retorna linhas de colaboradores do GLPI
        $row_glpi_plugin_fields_computerutilizadors = ColaboradoresGlpi::all()->count();

        // Retorna linhas de computadores do SISGLIC
        $row_computadores = Computadores::all()->count();

        $computadoresGlpi = ComputadoresGlpi::all();
        $colaboradoresGlpi = ColaboradoresGlpi::all();
        $comps = Computadores::all();

        while ($row_computadores < $row_glpi_computers) {
            $a = $computadoresGlpi[$row_computadores]->id;
            $b = $computadoresGlpi[$row_computadores]->name;
            $c = $computadoresGlpi[$row_computadores]->otherserial;
            //////////////////////////////////////////////////
            for ($i = 0; $i < $row_glpi_plugin_fields_computerutilizadors; $i++) {
                if ($colaboradoresGlpi[$i]->items_id == $a) {
                    $d = $colaboradoresGlpi[$i]->colaboradorfield;
                    $i = $row_glpi_plugin_fields_computerutilizadors;
                } else {
                    $d = "";
                }
            }

            Computadores::insert(
                [
                    'glpi_id' => $a,
                    'name' => $b,
                    'otherserial' => $c,
                    'colaboradorfield' => $d
                ]
            );

            // Retorna linhas de computadores do GLPI
            $row_glpi_computers = ComputadoresGlpi::all()->count();

            // Retorna linhas de colaboradores do GLPI
            $row_glpi_plugin_fields_computerutilizadors = ColaboradoresGlpi::all()->count();

            // Retorna linhas de computadores do SISGLIC
            $row_computadores = Computadores::all()->count();

            $computadoresGlpi = ComputadoresGlpi::all();
            $colaboradoresGlpi = ColaboradoresGlpi::all();
        }

        return redirect('/computadores');
    }
}
