<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Nominator;
use App\Models\TeamNominee;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class TeamNominationController extends Controller
{
    public function create(Request $request)
    {
        return Inertia::render('Nominate/Team/Create');
    }


    public function store(Request $request)
    {
        // create TeamNominee
        $teamNominee = TeamNominee::create(Arr::except($request->input('team'), 'players'));
        // create TeamMembers
        $request->collect('team.players')->each(function ($player) use ($teamNominee) {
            $teamNominee->members()->create($player);
        });
        // create nominator
        $nominator = Nominator::firstOrCreate(['email' => $request->input('nominator.email')], $request->input('nominator'));
        $teamNominee->nominator()->associate($nominator);
        //return to page
        return redirect()->back()->with('success', true);
    }
}
