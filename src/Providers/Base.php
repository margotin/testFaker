<?php declare(strict_types=1);


namespace Nitogram\Faker\Providers;


class Base
{
    /**
     * @param array $array
     * @return mixed
     */
    public static function randomElement(array $array)
    {
        return $array[array_rand($array)];
    }
}