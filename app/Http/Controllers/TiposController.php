<?php

namespace App\Http\Controllers;

use App\Models\Tipos;
use Illuminate\Http\Request;

class TiposController extends Controller
{
    public function listTipos()
    {
        $tipos = Tipos::all();

        return view('/tipos.tipos', ['tipos' => $tipos]);
    }

    public function create()
    {
        return view('/tipos.tipos_create');
    }

    public function store(Request $request)
    {
        $tipo = new Tipos;
        $tipo->descTipo = $request->descTipo;
        $tipo->save();
        return redirect('/tipos');
    }

    public function edit($id)
    {
        $tipo = Tipos::findOrFail($id);
        return view('/tipos.tipos_edit', ['tipo' => $tipo]);
    }

    public function update(Request $request)
    {
        Tipos::findOrFail($request->id)->update($request->all());
        return redirect('/tipos');
    }

    public function destroy($id)
    {
        Tipos::findOrFail($id)->delete();
        return redirect('/tipos');
    }
}
