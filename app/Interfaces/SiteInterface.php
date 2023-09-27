<?php

namespace App\Interfaces;

interface SiteInterface
{
    public function getSiteByNewPath($newPath);
    public function createNewSite($fullPath);
}
