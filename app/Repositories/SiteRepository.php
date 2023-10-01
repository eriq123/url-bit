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

    public function getMaxUniquePathCombinations($length)
    {
        $lowercaseLetters = 26;
        $uppercaseLetters = 26;

        return pow(($lowercaseLetters + $uppercaseLetters), $length);
    }

    public function getUniquePathLength($length, $arrNewPathCount)
    {
        if ($arrNewPathCount >= $this->getMaxUniquePathCombinations($length)) {
            return $this->getUniquePathLength(++$length, $arrNewPathCount);
        }

        return $length;
    }

    public function getUniquePath($length = null)
    {
        $arrSiteNewPaths = Site::pluck('new_path')->toArray();
        if (!isset($length)) $length = $this->uniquePathLength;
        $length = $this->getUniquePathLength($length, count($arrSiteNewPaths));

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
