<?php

namespace Tests\Unit;

use App\Repositories\SiteRepository;
use PHPUnit\Framework\TestCase;

class UniquePathTest extends TestCase
{

    public function test_unique_path_combinations_of_three()
    {
        $siteRepository = new SiteRepository();
        $length = 3;
        $max = 140608;

        $newMax = $siteRepository->getMaxUniquePathCombinations($length);
        $this->assertEquals($newMax, $max);
    }

    public function test_unique_path_combinations_of_four()
    {
        $siteRepository = new SiteRepository();
        $length = 4;
        $max = 7311616;

        $newMax = $siteRepository->getMaxUniquePathCombinations($length);
        $this->assertEquals($newMax, $max);
    }

    public function test_unique_path_length_three_less_than_max_combination()
    {
        $siteRepository = new SiteRepository();
        $length = 3;
        $max = 140608;
        $newLength = $siteRepository->getUniquePathLength($length, --$max);
        $this->assertEquals($newLength, $length);
    }

    public function test_unique_path_length_three_equals_max_combination()
    {
        $siteRepository = new SiteRepository();
        $length = 3;
        $max = 140608;
        $newLength = $siteRepository->getUniquePathLength($length, $max);
        $this->assertEquals($newLength, $length + 1);
    }

    public function test_unique_path_length_three_more_than_max_combination()
    {
        $siteRepository = new SiteRepository();
        $length = 3;
        $max = 140608;
        $newLength = $siteRepository->getUniquePathLength($length, $max + 1);
        $this->assertEquals($newLength, $length + 1);
    }

    public function test_unique_path_length_three_less_than_max_combination_of_four()
    {
        $siteRepository = new SiteRepository();
        $length = 3;
        $max = 7311616;
        $newLength = $siteRepository->getUniquePathLength($length, --$max);
        $this->assertEquals($newLength, $length + 1);
    }

    public function test_unique_path_length_three_equals_max_combination_of_four()
    {
        $siteRepository = new SiteRepository();
        $length = 3;
        $max = 7311616;
        $newLength = $siteRepository->getUniquePathLength($length, $max);
        $this->assertEquals($newLength, $length + 2);
    }

    public function test_unique_path_length_three_more_than_max_combination_of_four()
    {
        $siteRepository = new SiteRepository();
        $length = 3;
        $max = 7311616;
        $newLength = $siteRepository->getUniquePathLength($length, ++$max);
        $this->assertEquals($newLength, $length + 2);
    }
}
