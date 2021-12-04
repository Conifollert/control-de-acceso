<?php

namespace App\Http\Controllers\API;

use App\Models\Access;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccessController extends Controller
{
    public function index()
    {
        $accesses = Access::select('id','dni','name','lastname','date','time','tower','floor','number_depto')
            ->orderBy('id', 'DESC')
            ->paginate(10);
        return  $accesses;
    }

}
