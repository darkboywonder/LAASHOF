<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Nominator;
use App\Models\TeamNominee;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTeamNomineeRequest;

class TeamNominationController extends Controller
{
    public function create(Request $request)
    {
        return Inertia::render('Nominate/Team/Create');
    }


    public function store(StoreTeamNomineeRequest $request)
    {
        // create TeamNominee
        $teamNominee = TeamNominee::create(Arr::except($request->input('team'), 'players'));
        // create TeamMembers
        $request->collect('team.players')->filter(function ($value, $key) {
            return $value['name'] !== '' && $value['name'] !== null;
        })->each(function ($player) use ($teamNominee) {
            $teamNominee->members()->create($player);
        });
        // create nominator
        $nominator = Nominator::firstOrCreate(['email' => $request->input('nominator.email')], $request->input('nominator'));
        $teamNominee->nominator()->associate($nominator);
        //return to page
        return redirect()->back()->with('success', true);
    }
}
