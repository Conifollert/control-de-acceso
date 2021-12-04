<?php

namespace App\Http\Controllers\API;

use App\Models\Access;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
