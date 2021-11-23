<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function listStatus()
    {
        $status = Status::all();
        return view('/status.status', ['status' => $status]);
    }

    public function create()
    {
        return view('/status.status_create');
    }

    public function store(Request $request)
    {
        $status = new Status;
        $status->descStatus = $request->descStatus;
        $status->save();
        return redirect('/status');
    }

    public function edit($id)
    {
        $status = Status::findOrFail($id);
        return view('/status.status_edit', ['status' => $status]);
    }

    public function update(Request $request)
    {
        Status::findOrFail($request->id)->update($request->all());
        return redirect('/status');
    }

    public function destroy($id)
    {
        Status::findOrFail($id)->delete();
        return redirect('/status');
    }
}
