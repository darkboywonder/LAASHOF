<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Scholar;
use App\Models\Guardian;
use Illuminate\Http\Request;
use App\Models\ScholarDocument;
use Illuminate\Http\UploadedFile;

class ScholarshipController extends Controller
{
    public function create(Request $request)
    {
        return Inertia::render('Scholarship/Create');
    }

    public function store(Request $request)
    {
        $scholar = Scholar::create($request->input('applicant'));
        $scholar->guardian()->create($request->input('parent'));

        collect($request->file('documents'))->each(function (UploadedFile $document) use ($scholar) {
            $scholar->documents()->create([
                'path' => $document->store('documents'),
                'name' => $document->getClientOriginalName(),
                'extension' => $document->getClientOriginalExtension(),
                'size' => $document->getSize(),
            ]);
        });

        return redirect()->back()->with('success', true);
    }
}
