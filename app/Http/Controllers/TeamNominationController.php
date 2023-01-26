<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class TeamNominationController extends Controller
{
    public function create(Request $request)
    {
        return Inertia::render('Nominate/Team/Create');
    }


    public function store(Request $request)
    {
        //
    }
}
