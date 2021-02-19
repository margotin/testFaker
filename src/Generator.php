<?php declare(strict_types=1);


namespace Nitogram\Faker;

use Nitogram\Faker\Providers\Base;

class Generator
{
    protected array $providers = [];
    protected array $formatters = [];

    public function addProvider(Base $provider): void
    {
        array_unshift($this->providers, $provider);
    }

    public function getProviders(): array
    {
        return $this->providers;
    }

    /**
     * @param string $property
     * @return mixed
     */
    public function __get(string $property)
    {
        return $this->format($property);
    }

    /**
     * @param string $method
     * @param array $arguments
     * @return mixed
     */
    public function __call(string $method, array $arguments = [])
    {
        return $this->format($method, $arguments);
    }

    /**
     * @param string $formatter
     * @param array $arguments
     * @return mixed
     */
    protected function format(string $formatter, array $arguments = [])
    {
//        return call_user_func_array($this->getFormatter($formatter),[]);
        return $this->getFormatter($formatter)(...$arguments);
    }

    protected function getFormatter(string $formatter): callable
    {
        if (isset($this->formatters[$formatter])) {
            return $this->formatters[$formatter];
        }

        foreach ($this->providers as $provider) {
            if (method_exists($provider, $formatter)) {
                $this->formatters[$formatter] = [$provider, $formatter];
                return $this->formatters[$formatter];
            }
        }

        throw new \InvalidArgumentException(sprintf('Formatteur "%s" inconnu.', $formatter));
    }
}