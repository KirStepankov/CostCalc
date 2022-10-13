<?php

namespace CostCalc;

class Helper
{
    public static function getPercentFromNumber($numberMax, $numberMin): int
    {
        $percent = (1 - ($numberMin / $numberMax)) * 100;
        return round($percent);
    }

    public static function getPercentWeight($weightStart, $weightEnd): float|int
    {
        if ($weightStart > $weightEnd) {
            return ($weightEnd / $weightStart) * 100 * -1;
        } else {
            return $weightEnd / $weightStart;
        }
    }

    public static function getPricePercent($basePrice, $percent): float|int
    {
        if ($percent < 0) {
            $percent = abs($percent);
            return $basePrice - ($basePrice * ($percent / 100));
        } else {
            return $basePrice * $percent;
        }
    }

    public static function getIncreasePrice($price, $percent): float|int
    {
        return $price + ($price * ($percent / 100));
    }
}