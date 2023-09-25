<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SiteController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function view($newPath)
    {
        $site = Site::where(
            'new_path',
            $newPath
        )->first();

        return isset($site) ? view('view', compact('site')) : view('index');
    }

    public function shorten(Request $request)
    {
        $site = new Site();
        $site->full_path = $request->url;
        do {
            $site->new_path = Str::random(5);
            $validateNewPathUniqueness = Site::where('new_path', $site->new_path)->get();
        } while ($validateNewPathUniqueness->count() !== 0);

        $site->save();

        return redirect()->route('view', ['url' => $site->new_path]);
    }

    public function redirect($url)
    {
        $site = Site::where('new_path', $url)->first();
        if (isset($site->full_path)) {
            return redirect($site->full_path);
        } else {
            abort(401);
        }
    }
}
