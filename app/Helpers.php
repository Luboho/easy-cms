<?php

namespace App\HelperClass;

use App\Logo;
use App\Company;

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