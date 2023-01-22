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
        $nominee = Nominee::create($request->input('nominee'));
        $nominator = Nominator::create($request->input('nominator'));
        $nominee->nominator()->associate($nominator);
        $nominee->save();

        if ($request->has('relative.first_name')) {
            $nominee->relative()->create($request->input('relative'));
        }

        return redirect()->back();
    }
}
