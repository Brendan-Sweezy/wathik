<?php

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
    $sid = getenv("TWILIO_ACCOUNT_SID");
    $token = getenv("TWILIO_AUTH_TOKEN");
    $twilio = new Client($sid, $token);

    $message = $twilio->messages
        ->create(
            "whatsapp:+966533160210", // to
            [
                "from" => "whatsapp:+14155238886",
                "body" => "Your appointment is coming up on July 21 at 3PM"
            ]
        );
});
Route::post('/receive', function () {

    $sid = getenv("TWILIO_ACCOUNT_SID");
    $token = getenv("TWILIO_AUTH_TOKEN");
    $twilio = new Client($sid, $token);

    $message = $twilio->messages
        ->create(
            "whatsapp:+966533160210", // to
            [
                "from" => "whatsapp:+14155238886",
                "body" => "Recived"
            ]
        );
});

Route::post('/status', function () {
    $sid = getenv("TWILIO_ACCOUNT_SID");
    $token = getenv("TWILIO_AUTH_TOKEN");
    $twilio = new Client($sid, $token);

    // $message = $twilio->messages
    //     ->create(
    //         "whatsapp:+966533160210", // to
    //         [
    //             "from" => "whatsapp:+14155238886",
    //             "body" => "Status"
    //         ]
    //     );
});
