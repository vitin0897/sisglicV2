<?php

namespace App\Http\Controllers;

use App\Models\Softwares;
use Illuminate\Http\Request;

class SoftwaresController extends Controller
{
    public function listSoftwares()
    {
        $softwares = Softwares::all();
        return view('/softwares.softwares', ['softwares' => $softwares]);
    }

    public function create()
    {
        return view('/softwares.softwares_create');
    }

    public function store(Request $request)
    {
        $softwares = new Softwares;
        $softwares->descSoftware = $request->descSoftware;
        $softwares->save();
        return redirect('/softwares');
    }

    public function edit($id)
    {
        $softwares = Softwares::findOrFail($id);
        return view('/softwares.softwares_edit', ['softwares' => $softwares]);
    }

    public function update(Request $request)
    {
        Softwares::findOrFail($request->id)->update($request->all());
        return redirect('/softwares');
    }

    public function destroy($id)
    {
        Softwares::findOrFail($id)->delete();
        return redirect('/softwares');
    }
}
