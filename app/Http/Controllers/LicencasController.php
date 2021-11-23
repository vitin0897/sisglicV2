<?php

namespace App\Http\Controllers;

use App\Models\Computadores;
use App\Models\Historico;
use App\Models\Licencas;
use App\Models\Softwares;
use App\Models\Status;
use App\Models\Tipos;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysqli;

class LicencasController extends Controller
{
    public function listLicencas(Request $request)
    {
        $licencas = DB::table('licencas')
            ->join('computadores', 'licencas.computador_id', '=', 'computadores.id')
            ->join('softwares', 'licencas.software_id', '=', 'softwares.id')
            ->join('status', 'licencas.status_id', '=', 'status.id')
            ->select(
                'licencas.*',
                'computadores.colaboradorfield',
                'computadores.otherserial',
                'softwares.descSoftware'
            );

        $search = request('search');

        if ($search) {
            $licencas->where('serial', 'like', '%' . $search . '%')
                ->orWhere('otherserial', 'like', '%' . $search . '%')
                ->orWhere('colaboradorfield', 'like', '%' . $search . '%');
        }

        if ($request->software_id) {
            $licencas->where('softwares.id', $request->software_id);
        }

        if ($request->status_id) {
            $licencas->where('status.id', $request->status_id);
        }


        $licencas = $licencas->get();

        $softwares = Softwares::all();
        $status = Status::all();

        return view('/licencas.dashboard', ['licencas' => $licencas, 'status' => $status, 'softwares' => $softwares, 'search' => $search]);
    }

    public function create()
    {
        $licencas = Licencas::all();
        $softwares = Softwares::all();
        $tipos = Tipos::all();
        $status = Status::all();
        $computadores = Computadores::all();

        return view('/licencas.licencas_create', [
            'licencas' => $licencas,
            'softwares' => $softwares,
            'tipos' => $tipos,
            'status' => $status,
            'computadores' => $computadores,
        ]);
    }

    public function store(Request $request)
    {
        $licencas = new Licencas;
        $licencas->serial = $request->serial;
        $licencas->key = $request->key;
        $licencas->autorizacaoDeUso = $request->autorizacaoDeUso;
        $licencas->numeroEmpenho = $request->numeroEmpenho;
        $licencas->observacao = $request->observacao;
        $licencas->software_id = $request->software_id;
        $licencas->tipo_id = $request->tipo_id;
        $licencas->status_id = $request->status_id;
        $licencas->computador_id = $request->computador_id;

        // Anexo
        if ($request->hasFile('anexo') && $request->file('anexo')->isValid()) {
            $requestAnexo = $request->anexo;
            $extension = $requestAnexo->extension();
            $anexoName = md5($requestAnexo->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestAnexo->move(public_path('img/anexos'), $anexoName);
            $licencas->anexo = $anexoName;
        }

        $licencas->save();

        $usuario = auth()->user()->name;
        $lic_antigo = $request->serial;
        $pat_antigo = $request->computador_id;
        $timezone = new DateTimeZone('America/Sao_Paulo');
        $hora_acao = new DateTime('now', $timezone);
        $hora_acao = $hora_acao->format('H:i d/m/Y');

        Historico::insert([
            'usuario' => $usuario,
            'lic_antigo' => $lic_antigo,
            'pat_antigo' => $pat_antigo,
            'hora_acao' => $hora_acao
        ]);

        return redirect('/');
    }

    public function edit($id)
    {
        $licencas = Licencas::findOrFail($id);
        $softwares = Softwares::all();
        $tipos = Tipos::all();
        $status = Status::all();
        $computadores = Computadores::all();
        // 
        $sof = Softwares::findOrFail($licencas->software_id);
        $tip = Tipos::findOrFail($licencas->tipo_id);
        $sta = Status::findOrFail($licencas->status_id);
        $com = Computadores::findOrFail($licencas->computador_id);

        return view('/licencas.licencas_edit', [
            'licencas' => $licencas,
            'softwares' => $softwares,
            'sof' => $sof,
            'tipos' => $tipos,
            'tip' => $tip,
            'status' => $status,
            'sta' => $sta,
            'computadores' => $computadores,
            'com' => $com,
        ]);
    }

    public function update(Request $request)
    {
        $usuario = auth()->user()->name;
        $lic = Licencas::findOrFail($request->id);
        $lic_antigo = $lic->serial;
        $lic_atual = $request->serial;
        $pat_antigo = $lic->computador_id;
        $pat_atual = $request->computador_id;
        $timezone = new DateTimeZone('America/Sao_Paulo');
        $hora_acao = new DateTime('now', $timezone);
        $hora_acao = $hora_acao->format('H:i d/m/Y');

        Historico::insert([
            'usuario' => $usuario,
            'lic_antigo' => $lic_antigo,
            'lic_atual' => $lic_atual,
            'pat_antigo' => $pat_antigo,
            'pat_atual' => $pat_atual,
            'hora_acao' => $hora_acao
        ]);

        $data = $request->all();
        if ($request->hasFile('anexo') && $request->file('anexo')->isValid()) {
            $requestAnexo = $request->anexo;
            $extension = $requestAnexo->extension();
            $anexoName = md5($requestAnexo->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestAnexo->move(public_path('img/anexos'), $anexoName);
            $data['anexo'] = $anexoName;
        }

        Licencas::findOrFail($request->id)->update($data);

        return redirect('/');
    }

    public function destroy($id)
    {
        $usuario = auth()->user()->name;
        $lic = Licencas::findOrFail($id);
        $lic_antigo = $lic->serial;
        $lic_atual = "DELETADO";
        $pat_antigo = $lic->computador_id;
        $pat_atual = $lic->computador_id;
        $timezone = new DateTimeZone('America/Sao_Paulo');
        $hora_acao = new DateTime('now', $timezone);
        $hora_acao = $hora_acao->format('H:i d/m/Y');

        Historico::insert([
            'usuario' => $usuario,
            'lic_antigo' => $lic_antigo,
            'lic_atual' => $lic_atual,
            'pat_antigo' => $pat_antigo,
            'pat_atual' => $pat_atual,
            'hora_acao' => $hora_acao
        ]);

        Licencas::findOrFail($id)->delete();
        return redirect('/');
    }
}
