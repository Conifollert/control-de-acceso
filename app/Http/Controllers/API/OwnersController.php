<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnersController extends Controller
{
    public function index()
    {
        return Owner::paginate(10);
    }

    public function show(Owner $owner)
    {
        return $owner;
    }

    public function destroy(Owner $owner)
    {
        $owner->delete();
        return Owner::paginate(10);
    }
}
