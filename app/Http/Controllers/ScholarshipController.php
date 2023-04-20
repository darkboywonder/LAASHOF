<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function create(Request $request) {
        return Inertia::render('Scholarship/Create');
    }

}
