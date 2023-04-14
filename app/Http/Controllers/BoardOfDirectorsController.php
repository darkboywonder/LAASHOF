<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\BoardMember;
use Illuminate\Http\Request;

class BoardOfDirectorsController extends Controller
{
        /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return Inertia::render('About/Board', [
            'boardMembers' => BoardMember::orderBy('order')->get(),
        ]);
    }
}
