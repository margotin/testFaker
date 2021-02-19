<?php declare(strict_types=1);


namespace Nitogram\Faker\Providers;


class Person extends Base
{
    public static array $firstNames = [
        'Adrien'
    ];

    public static $lastNames = [
        'Martin'
    ];

    public function firstName(): string
    {
        return static::randomElement(static::$firstNames);
    }

    public function lastName(): string
    {
        return static::randomElement(static::$lastNames);
    }
}