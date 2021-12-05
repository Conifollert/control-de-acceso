<?php

namespace App\Http\Controllers\API;

use App\Models\Access;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccessRequest;

class AccessController extends Controller
{
    public function index(Request $request)
    {
        $dni = $request->dni;
        $date = $request->date;
        $accesses = Access::select('id','dni','name','lastname','date','time','tower','floor','number_depto')
            ->orderBy('date', 'DESC')
            ->orderBy('time', 'DESC')
            ->dni($dni)
            ->date($date)
            ->paginate(10);
        return  $accesses;
    }

    public function store(StoreAccessRequest $request)
    {
        $access = new Access;
        $access->dni = $request->dni;
        $access->name = $request->name;
        $access->lastname = $request->lastname;
        $access->date = $request->date;
        $access->time = $request->time;
        $access->tower = $request->tower;
        $access->floor = $request->floor;
        $access->number_depto = $request->number_depto;
        $access->save();

        return $access;
    }

    public function getAccessByDni(Request $request)
    {
        $access = Access::select('id', 'name', 'lastname','tower','floor','number_depto')
            ->where('dni', $request->dni)
            ->orderBy('id', 'ASC')
            ->first();
        return $access;
    }
}
