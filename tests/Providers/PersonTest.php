<?php declare(strict_types=1);


namespace Nitogram\Faker\Tests\Providers;

use Nitogram\Faker\Generator;
use Nitogram\Faker\Providers\Person;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{

    protected Generator $generator;

    public function setUp(): void
    {
        $this->generator = new Generator();
        $this->generator->addProvider(new Person());
    }

    /** @test */
    public function firstName(): void
    {
        $actual = $this->generator->firstName;

        $this->assertContains($actual, Person::$firstNames);
    }

    /** @test */
    public function lastName(): void
    {
        $actual = $this->generator->lastName;

        $this->assertContains($actual, Person::$lastNames);
    }
}