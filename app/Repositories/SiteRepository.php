<?php

namespace App\Repositories;

use App\Interfaces\SiteInterface;
use App\Models\Site;
use Illuminate\Support\Str;

class SiteRepository implements SiteInterface
{
    private $uniquePathLength = 4;

    public function getSiteByNewPath($newPath)
    {
        return Site::where('new_path', $newPath)->first();
    }

    private function getMaxUniquePathCombinations($length)
    {
        $lowercaseLetters = 26;
        $uppercaseLetters = 26;

        return pow(($lowercaseLetters + $uppercaseLetters), $length);
    }

    private function getUniquePathLength($length, $arrNewPaths)
    {
        if (!isset($length)) $length = $this->uniquePathLength;

        if (count($arrNewPaths) >= $this->getMaxUniquePathCombinations($length)) {
            return $this->getUniquePathLength(++$length, $arrNewPaths);
        }

        return $length;
    }

    private function getUniquePath($length)
    {
        $arrSiteNewPaths = Site::pluck('new_path')->toArray();
        $length = $this->getUniquePathLength($length, $arrSiteNewPaths);

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
