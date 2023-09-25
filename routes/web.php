<?php

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $site = Site::all();
    return view('index');
});


Route::post('/shorten', function (Request $request) {

    $site = new Site();

    $site->full_path = $request->url;


    do {
        $newPath = Str::random(12);
        $validateNewPathUniqueness = Site::where('new_path', $newPath)->get();
        Log::info($newPath);
    } while ($validateNewPathUniqueness->count() !== 0);

    $site->new_path = $newPath;
    $site->save();

    return view('index', ['site' => $site]);
});

Route::get('/{url}', function ($url) {

    $site = Site::where('new_path', $url)->first();
    if (isset($site->full_path)) {
        return redirect($site->full_path);
    } else {
        abort(401);
    }
});
