<?php

class Speedometer
{
    private const MILES_PER_KM = 0.62137;

    public static function convertKmToMiles(float $km): float
    {
        return $km * self::MILES_PER_KM;
    }

    public static function convertMileToKm(float $miles): float
    {
        return $miles / self::MILES_PER_KM;
    }
}