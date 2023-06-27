<?php

use App\Models\City;
use App\Models\PropertyMaster;
use App\Models\PropertyType;
use App\Models\Taluka;

function city()
{
    $city = City::where('flag', 1)->get(['id', 'city']);
    return $city;
}

function propertyType()
{
    $propertyType = PropertyType::where('flag', 1)->get(['id', 'property_type']);
    return $propertyType;
}

function taluka()
{
    $taluka = Taluka::where('flag', 1)->get(['id', 'taluka']);
    return $taluka;
}

function footer()
{
    $allDetails = PropertyMaster::where('flag', 1)->orderBy('id', 'DESC')->limit(2)->get();
    return $allDetails;
}

function convertCurrency($number)
{
    $unitArray = ['4' => 'K', '5' => 'K', '6' => 'Lacs', '7' => 'Lacs', '8' => 'Cr', '9' => 'Cr'];
    $numLen = strlen($number);
    if ($numLen > 5) {
        foreach ($unitArray as $nmLen => $unit) {
            if ($numLen == $nmLen) {
                if ($nmLen % 2 == 0) {
                    // echo 123;
                    // exit();
                    $remNumber = substr($number, 1, 2);
                    // $ckNmGtZer = $remNumber[0] + $remNumber[1] + $remNumber[2];
                    // if ($ckNmGtZer < 1) {
                    //     $remNumber = '';
                    // } else {
                    if ($remNumber[0] == 0 && $remNumber[1] == 0 && is_array($remNumber)) {
                        $remNumber[1] = '';
                        $remNumber[2] = '';
                    }
                    // }
                    if ($remNumber == 00) {
                        echo $number = substr($number, 0, $numLen - $nmLen + 1) . " $unit";
                    } else {
                        echo $number = substr($number, 0, $numLen - $nmLen + 1) . '.' . $remNumber . " $unit";
                    }
                } else {
                    $remNumber = substr($number, 2, 2);
                    // echo $remNumber;
                    // exit();
                    // $ckNmGtZer = $remNumber[0] + $remNumber[1] + $remNumber[2];
                    // if ($ckNmGtZer < 1) {
                    // } else {
                    if ($remNumber[0] == 0 && $remNumber[1] == 0 && is_array($remNumber)) {
                        $remNumber[1] = '';
                        $remNumber[2] = '';
                    }
                    // }
                    if ($remNumber == 00) {
                        $number = substr($number, 0, $numLen - $nmLen + 2) . " $unit";
                    } else {
                        $number = substr($number, 0, $numLen - $nmLen + 2) . '.' . $remNumber . " $unit";
                    }
                }
            }
        }
        return $number;
    } elseif ($numLen == 5) {
        $number = substr_replace($number, ',', 2, 0);
        return $number;
    } else {
        return $number;
    }
}
