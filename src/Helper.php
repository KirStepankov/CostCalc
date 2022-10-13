<?php

namespace CostCalc;

class Helper
{
    public static function getPercentFromNumber($numberMax, $numberMin): int
    {
        $percent = (1 - ($numberMin / $numberMax)) * 100;
        return round($percent);
    }

    public static function getIncreasePrice($price, $percent): float|int
    {
        return $price + ($price * ($percent / 100));
    }
}