<?php

namespace App\Repositories;

use App\Interfaces\SiteInterface;
use App\Models\Site;
use Illuminate\Support\Str;

class SiteRepository implements SiteInterface
{
    public function getSiteByNewPath($newPath)
    {
        return Site::where('new_path', $newPath)->first();
    }

    private function getUniquePath($length = 4)
    {
        $arrSiteNewPaths = Site::pluck('new_path')->toArray();
        do {
            $uniquePath = Str::random($length);
        } while (in_array($uniquePath, $arrSiteNewPaths));

        return $uniquePath;
    }

    public function createNewSite($fullPath, $ip)
    {
        $site = new Site();
        $site->ip_address = $ip;
        $site->full_path = $fullPath;
        $site->new_path = $this->getUniquePath();
        $site->save();

        return $site;
    }

    public function getSitesByIp($ip)
    {
        return Site::where('ip_address', $ip)->get();
    }
}
