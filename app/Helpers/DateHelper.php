<?php
/**
 * Created by PhpStorm.
 * User: Yoni Assous
 * Date: 12/02/2019
 * Time: 13:27
 */

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    /**
     * @param $input
     * @return Carbon
     */
    public static function toCarbon($input){
        if(! $input instanceof Carbon){
            return Carbon::parse($input);
        }
        else return $input;
    }

    /**
     * @param \Illuminate\Support\Carbon|string  $datetime (datetime)
     * @return int
     */
    public static function isExpired($datetime){
        return Carbon::now()->greaterThan(static::toCarbon($datetime));
    }

    /**
     * @param $datetime
     * @return int
     */
    public static function isNotAllowedCancel($datetime){
        $minimumDate = static::toCarbon($datetime)->addDays(-intval(config('appstractor.number_day_cancel_limit')));
        return self::isExpired($minimumDate);
    }

    public static function defineDateStatusToCancel(Carbon $departure_date)
    {
        if(self::isExpired($departure_date)){
            return 'over';
        }
        elseif(self::isNotAllowedCancel($departure_date)){
            return 'tooClose';
        }
        else{
            return 'ok';
        }
    }
}