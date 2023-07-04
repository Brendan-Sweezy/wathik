<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrgnizationController;
use App\Http\Controllers\ParticipantsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\WhatsAppController;
use Illuminate\Support\Facades\Route;
use Twilio\Rest\Client;

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
    return view('pages.home');
});

Route::get('/about', function() {
    return view('pages.about');
});

Route::get('/contactUs', function() {
    return view('pages.contactUs');
});

Route::get('/ownership', function () {
    return view('pages.ownership');
});

Route::get('/documentation', function () {
    return view('pages.documentation');
});

Route::get('/privacyPolicy', function () {
    return view('pages.privacyPolicy');
});

Route::controller(LoginController::class)->group(function () {
    Route::get("login", 'login')->name('login');
    Route::post("authenticate", 'authenticate');
    Route::post("otp", 'otplogin');
    Route::get("logout", 'logout');
    Route::get("createAccount", 'createAccountView');
    Route::post("createAccountAuthenticate", 'authenticateNewAccount');
});

Route::middleware(['userSession'])
    ->controller(HomeController::class)
    ->group(function () {
        Route::get("home", 'home')->name('home');
        Route::get("wizard", 'wizard');
        Route::post("saveWizard", 'saveWizard');
    });

Route::middleware(['userSession'])
    ->controller(OrgnizationController::class)
    ->prefix('orgnization')
    ->group(function () {
        Route::get("/", 'home')->name('orgnization');
        Route::get("/{target}", 'view')->name('orgnization');
    });

Route::middleware(['userSession'])
    ->controller(ProjectsController::class)
    ->prefix('projects')
    ->group(function () {
        Route::get("/", 'home')->name('projects');
        Route::get("add", 'add');
        Route::get("addThreats/{id}", 'addThreats');
        Route::get("addParticipants/{id}", 'addParticipants');
        Route::get("addEvents/{id}", 'addEvents');
        Route::post("save", 'save');
        Route::get("view/{id}", 'view');
    });

Route::middleware(['userSession'])
    ->controller(ParticipantsController::class)
    ->prefix('participants')
    ->group(function () {
        Route::post("add", 'add');
    });

Route::middleware(['userSession'])
    ->controller(EventsController::class)
    ->prefix('events')
    ->group(function () {
        Route::post("add", 'add');
    });
Route::middleware(['userSession'])
    ->controller(ReportsController::class)
    ->prefix('reports')
    ->group(function () {
        Route::get("/", 'home')->name('reports');
        Route::get("/generate", 'generate')->name('generate');
    });




// WhatsApp Recive Api
Route::post('/receive', function () {
});


Route::controller(WhatsAppController::class)
    ->prefix('whatsapp')
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class])
    ->group(function () {
        Route::post("webhook", 'webhook');
        Route::post("fallback", 'fallback');
        Route::post("status", 'status');
    });
