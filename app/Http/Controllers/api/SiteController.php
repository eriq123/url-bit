<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteShortenRequest;
use App\Repositories\SiteRepository;

class SiteController extends Controller
{
    private $siteRepository;

    public function __construct(SiteRepository $siteRepository)
    {
        $this->siteRepository = $siteRepository;
    }

    public function shorten(SiteShortenRequest $request)
    {
        return response()->json([
            'site' => $this->siteRepository->createNewSite($request->url)
        ]);
    }

    public function findByNewPath($newPath)
    {
        return response()->json([
            'site' => $this->siteRepository->getSiteByNewPath($newPath)
        ]);
    }
}
