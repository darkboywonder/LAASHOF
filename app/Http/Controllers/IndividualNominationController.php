<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNomineeRequest;
use App\Models\Nominator;
use Inertia\Inertia;
use App\Models\Nominee;
use Illuminate\Http\Request;

class IndividualNominationController extends Controller
{
    public function create(Request $request)
    {
        return Inertia::render('Nominate/Individual/Create');
    }

    public function store(StoreNomineeRequest $request)
    {
        $nominee = Nominee::create(array_merge(
            $request->input('nominee'),
            ['deceased' => $request->input('nominee.deceased') === 'yes' ? true : false]
        ));
        $nominator = Nominator::firstOrCreate(['email' => $request->input('nominator.email')], $request->input('nominator'));
        // @todo update this
        $nominee->nominatable()->associate($nominator);
        $nominee->save();

        if ($nominee->deceased) {
            $nominee->relative()->create($request->input('relative'));
        }

        return redirect()->back()->with('success', true);
    }
}
