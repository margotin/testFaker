<?php declare(strict_types=1);


namespace Nitogram\Faker;


class Factory
{
    private const DEFAULT_LOCAL = "fr_FR";
    protected static array $defaultProviders = ['Person'];

    public static function create(string $locale = self::DEFAULT_LOCAL): Generator
    {
        $generator = new Generator();

        foreach (static::$defaultProviders as $provider) {
            $providerClassName = static::getProviderClassName($provider, $locale);
            $generator->addProvider(new $providerClassName());
        }

        return $generator;
    }

    public static function getProviderClassName(string $className, string $locale): string
    {
        $providerClassName = sprintf("Nitogram\Faker\Providers\%s\%s", $locale, $className);

        if (class_exists($providerClassName)) {
            return $providerClassName;
        }

        throw new \InvalidArgumentException(
            sprintf('Impossible de trouver le provider "%s" avec la locale "%s".',
                $className,
                $locale
            )
        );
    }
}