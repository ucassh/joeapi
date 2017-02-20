<?php

namespace Joe\Helper;

class TimeHelper
{
    public static function monthNameToNumber($monthName)
    {
        switch ($monthName) {
            case 'stycznia':
                return '01';
            case 'lutego':
                return '02';
            case 'marca':
                return '03';
            case 'kwietnia':
                return '04';
            case 'maja':
                return '05';
            case 'czerwca':
                return '06';
            case 'lipca':
                return '07';
            case 'sierpnia':
                return '08';
            case 'września':
                return '09';
            case 'października':
                return '10';
            case 'listopada':
                return '11';
            case 'grudnia':
                return '12';
            default:
                return '01';
        }
    }
}
