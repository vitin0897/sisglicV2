<?php

namespace App\Http\Controllers;

use App\Models\Historico;
use App\Models\Licencas;
use App\Models\Softwares;
use App\Models\Status;
use App\Models\Tipos;
use Illuminate\Support\Facades\DB;
use PDF;

class PdfController extends Controller
{
    public function gerarPdf(){
        $licencas = Licencas::all();

        $pdf = PDF::loadview('licencas.licencas_pdf', compact('licencas'));

        return $pdf->setPaper('a4')->stream('Todas licencas');
    }

    public function pdfTipo(){
        $tipos = Tipos::all();
        $pdf = PDF::loadview('tipos.tipos_pdf', compact('tipos'));
        return $pdf->setPaper('a4')->stream('Tipos');
    }

    public function pdfStatus(){
        $status = Status::all();
        $pdf = PDF::loadview('status.status_pdf', compact('status'));
        return $pdf->setPaper('a4')->stream('Status');
    }

    public function pdfSoftwares(){
        $softwares = Softwares::all();
        $pdf = PDF::loadview('softwares.softwares_pdf', compact('softwares'));
        return $pdf->setPaper('a4')->stream('Softwares');
    }

    public function log(){
        $log = DB::table('historicos')
                ->orderBy('id', 'desc')
                ->get();
        $pdf = PDF::loadview('log', compact('log'));
        return $pdf->setPaper('a4')->stream('log');
    }
}
