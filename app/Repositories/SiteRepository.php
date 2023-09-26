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

    private function getUniquePath($length = 5)
    {
        $arrSiteNewPaths = Site::pluck('new_path')->toArray();
        do {
            $uniquePath = Str::random($length);
        } while (in_array($uniquePath, $arrSiteNewPaths));

        return $uniquePath;
    }

    public function createNewSite($fullPath)
    {
        $site = new Site();
        $site->full_path = $fullPath;
        $site->new_path = $this->getUniquePath();
        $site->save();

        return $site;
    }
}
