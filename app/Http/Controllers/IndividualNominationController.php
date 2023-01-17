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
        dd($request->all());
        Nominator::create($request->input('nominator'))
            ->nominees()->create(array_merge(
                $request->input('nominee'),
                $request->only(['representative_attending', 'absence_reason', 'accomplishment_summary', 'additional_factors'])
            ));

        return redirect()->back();
    }
}
