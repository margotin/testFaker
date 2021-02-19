<?php declare(strict_types=1);

namespace Nitogram\Faker\Tests;

use Nitogram\Faker\Generator;
use Nitogram\Faker\Factory;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    /** @test */
    public function create_generator(): void
    {
        $faker = Factory::create();

        $this->assertInstanceOf(Generator::class, $faker);
    }

    /** @test */
    public function load_providers(): void
    {
        $faker = Factory::create();
        $providers = $faker->getProviders();

        $this->assertNotEmpty($providers);
    }

    /** @test */
    public function load_providers_with_locale(): void
    {
        $faker = Factory::create('en_US');
        $firstName = $faker->firstName;

        $this->assertContains($firstName, \Nitogram\Faker\Providers\en_US\Person::$firstNames);
    }

    /** @test */
    public function invalid_argument_exception_when_invalid_locale_or_provider(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $faker = Factory::create('toto');

    }
}