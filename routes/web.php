<?php

use App\Http\Controllers\BoardOfDirectorsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OurStoryController;
use App\Http\Controllers\FounderMessageController;
use App\Http\Controllers\FoundingMembersController;
use App\Http\Controllers\TeamNominationController;
use App\Http\Controllers\IndividualNominationController;
use App\Http\Controllers\ScholarshipController;
use App\Models\SponsorImage;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'sponsorImages' => SponsorImage::visible()->get(),
    ]);
})->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/nominate/individual', [IndividualNominationController::class, 'create'])->name('nominate.individual.create');
Route::post('/nominate/individual', [IndividualNominationController::class, 'store'])->name('nominate.individual.store');
Route::get('/nominate/team', [TeamNominationController::class, 'create'])->name('nominate.team.create');
Route::post('/nominate/team', [TeamNominationController::class, 'store'])->name('nominate.team.store');
Route::get('/scholarship', [ScholarshipController::class, 'create'])->name('scholarship.create');
Route::post('/scholarship', [ScholarshipController::class, 'store'])->name('scholarship.store');
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'post'])->name('contact.post');
Route::get('/about/story', OurStoryController::class)->name('about.story');
Route::get('/about/message', FounderMessageController::class)->name('about.message');
Route::get('/about/founding-members', FoundingMembersController::class)->name('about.founding-members');
Route::get('/about/board', BoardOfDirectorsController::class)->name('about.board');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
