<?php

namespace App\Helpers;

class DateHelper
{
    public static function daysToMonths($days)
    {
        // Mengonversi jumlah hari menjadi bulan
        return $days / 30;
    }
}
