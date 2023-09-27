<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteShortenRequest;
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
        return view('index', [
            'sites' => $this->siteRepository->getSitesByIp(request()->ip())
        ]);
    }

    public function view($newPath)
    {
        return view('view', [
            'site' => $this->siteRepository->getSiteByNewPath($newPath)
        ]);
    }


    public function shorten(SiteShortenRequest $request)
    {
        $this->siteRepository->createNewSite($request->url, request()->ip());
        return redirect()->route('index');
    }

    public function redirect($url)
    {
        $site = $this->siteRepository->getSiteByNewPath($url);
        return isset($site->full_path) ? redirect($site->full_path) : abort(404);
    }
}
