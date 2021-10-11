<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/index2', [PageController::class, 'index2'])->name('index2');


/*** Static Page Routes ***/
//Route::get('/', [PageController::class, 'index'])->name('index');
//Route::get('/howitworks', function () { return view('pages.howitworks'); })->name('howitworks');
//Route::get('/doiqualify', function () { return view('pages.doiqualify'); })->name('doiqualify');
//Route::get('/terms', function () { return view('pages.terms'); })->name('terms');
//Route::get('/privacy', function () { return view('pages.privacy'); })->name('privacy');
//Route::get('/marketing-opt-out', function () { return view('pages.marketing-opt-out'); })->name('marketing-opt-out');
//Route::get('/tcf', function () { return view('pages.tcf'); })->name('tcf');
//Route::get('/faqs', function () { return view('faq'); })->name('faqs');
//Route::get('/complaints', function () { return view('pages.complaints'); })->name('complaints');
//Route::get('/contact', function () { return view('pages.contact'); })->name('contact');
//Route::get('/privacy', function () { return view('pages.privacy'); })->name('privacy');
//Route::post('/marketing-opt-out', function () { return view('pages.marketing-opt-out'); });

//Route::get('/complaints', 'PageController');
Route::get('/apply', [FormController::class, 'index'])->name('apply');


/*** Post Routes ***/
Route::post('process/{countrycode}', [FormController::class, 'process'])->name('process');
/*** Check Status Routes ***/
Route::get('check-status/{countrycode}/{leadid}', [FormController::class, 'CheckStatusNew'])->name('checkstatus');

/*** Old Check Status Routes ***/
Route::get('last-check-status/uk', [FormController::class, 'check_status'])->name('lastcheckstatus.uk');
Route::get('last-check-status/us', [FormController::class, 'check_status'])->name('lastcheckstatus.us');

/*** Other Routes ***/
Route::get('process/get-address-suggestions/', [FormController::class, 'get-address-suggestions'])->name('process.get-address-suggestions');
Route::get('process/get-bank-suggestions/', [FormController::class, 'get-bank-suggestions'])->name('process.get-bank-suggestions');
Route::get('process/get-bank/', [FormController::class, 'get-bank'])->name('process.get-bank');

Route::fallback(function(){
    return redirect()->back();
});

