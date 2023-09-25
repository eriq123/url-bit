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

        return isset($site) ? view('view', compact('site')) : redirect()->route('index');
    }

    private function getUniquePath($length = 5)
    {
        $arrSiteNewPaths = Site::pluck('new_path')->toArray();

        do {
            $new_path = Str::random($length);
        } while (in_array($new_path, $arrSiteNewPaths));

        return $new_path;
    }

    public function shorten(Request $request)
    {
        $site = new Site();
        $site->full_path = $request->url;
        $site->new_path = $this->getUniquePath();
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
