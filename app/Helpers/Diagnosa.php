<?php

if (! function_exists('getNonNullIndexes')) {
    /**
     * Get non-null indexes
     */
    function getNonNullIndexes($array): array
    {
        $nonNullIndexes = [];

        $key = 1;
        foreach ($array as $value) {
            if ($value !== null) {
                $nonNullIndexes[] = $key;
            }

            $key++;
        }

        return $nonNullIndexes;
    }
}

if (! function_exists('countNonNullIndexes')) {
    /**
     * Count non-null indexes
     *
     * @param  array  $array
     */
    function countNonNullIndexes($array): int
    {
        return count(array_filter($array, function ($value) {
            return $value !== null;
        }));
    }
}

if (! function_exists('numberFormat')) {
    /**
     * Format number
     *
     * Format number with given decimal points, decimal point character, and thousands separator
     *
     * @param  $number  Number to format
     * @param  $decimals  Number of decimal points
     * @param  $decPoint  Decimal point character
     * @param  $thousandsSep  Thousands separator
     */
    function numberFormat($number, $decimals = 0, $decPoint = '.', $thousandsSep = ','): string
    {
        $negation = ($number < 0) ? (-1) : 1;
        $coefficient = 10 ** $decimals;
        $number = $negation * floor((string) (abs($number) * $coefficient)) / $coefficient;

        $result = number_format($number, $decimals, $decPoint, $thousandsSep);

        //get number behind comma
        $numberBehindComma = str_replace($decPoint, '', substr($result, strpos($result, $decPoint) + 1));

        // if number behind comma is 0, remove comma
        if ($numberBehindComma == 0) {
            $result = substr($result, 0, strpos($result, $decPoint));
        }

        return $result;
    }
}
