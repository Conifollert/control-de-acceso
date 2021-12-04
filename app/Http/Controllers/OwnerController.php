<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Http\Requests\StoreOwnerRequest;
use App\Http\Requests\UpdateOwnerRequest;

class OwnerController extends Controller
{
    public function index()
    {
        $owners = Owner::orderBy('id', 'DESC')
            ->paginate(10);
        return view('owners.index', compact('owners'));
    }

    public function create()
    {
        return view('owners.create');
    }

    public function store(StoreOwnerRequest $request)
    {
        Owner::create([
            'dni'               => $request->dni,
            'name'              => $request->name,
            'fathers_surname'   => $request->fathers_surname,
            'mothers_surname'   => $request->mothers_surname,
            'phone'             => $request->phone,
            'type_livingplace'  => 'DEPARTAMENTO',
            'number'            => $request->number,
        ]);

        return redirect()->route('owners.index');
    }

    public function show(Owner $owner)
    {
        //
    }

    public function edit(Owner $owner)
    {
        //
    }

    public function update(UpdateOwnerRequest $request, Owner $owner)
    {
        //
    }

    public function destroy(Owner $owner)
    {
        //
    }
}
