<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Founder;
use Illuminate\Http\Request;

class FoundingMembersController extends Controller
{
        /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return Inertia::render('About/FoundingMembers', [
            'founders' => Founder::orderBy('order')->get(),
        ]);
    }
}
