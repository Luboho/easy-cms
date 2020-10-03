<?php

namespace App\HelperClass;

use App\Logo;
use App\Post;
use App\Company;
use Intervention\Image\Facades\Image;

class Helper
{
    public static function getLogoGlobally()
    {
        $logos = Logo::all();
        return $logos;
    }

    public static function companyData()
    {
        $companyData = Company::all();
        return $companyData;
    }
}