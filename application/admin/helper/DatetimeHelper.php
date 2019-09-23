<?php


namespace app\admin\helper;


class DatetimeHelper
{
    public function todayTimestamp($time = '')
    {
        if (!$time) {
            $time = time();
        }
        $start = mktime(0,0,0,date("m",$time),date("d",$time),date("Y",$time));
        $end = mktime(23,59,59,date("m",$time),date("d",$time),date("Y",$time));
        return [$start, $end];
    }
}