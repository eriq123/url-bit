<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Repositories\SiteRepository;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    private $siteRepository;

    public function __construct(SiteRepository $siteRepository)
    {
        $this->siteRepository = $siteRepository;
    }

    public function index()
    {
        return view('index');
    }

    public function view($newPath)
    {
        return view('view', [
            'site' => $this->siteRepository->getSiteByNewPath($newPath)
        ]);
    }


    public function shorten(Request $request)
    {
        $site = $this->siteRepository->createNewSite($request->url);
        return redirect()->route('view', ['url' => $site->new_path]);
    }

    public function redirect($url)
    {
        $site = $this->siteRepository->getSiteByNewPath($url);
        return isset($site->full_path) ? redirect($site->full_path) : abort(404);
    }
}
