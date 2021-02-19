<?php declare(strict_types=1);

namespace Nitogram\Faker\Tests;

use Nitogram\Faker\Tests\Fixtures\Providers\Bar;
use Nitogram\Faker\Tests\Fixtures\Providers\Foo;
use PHPUnit\Framework\TestCase;
use Nitogram\Faker\Generator;

class GeneratorTest extends TestCase
{
    protected Generator $generator;

    public function setUp(): void
    {
        $this->generator = new Generator();
        $this->generator->addProvider(new Foo());
    }

    /** @test */
    public function give_priority_to_new_providers(): void
    {
        $this->generator->addProvider(new Bar());
        $this->assertInstanceOf(Bar::class, $this->generator->getProviders()[0]);
    }

    /** @test */
    public function get_data_from_providers_as_property(): void
    {
        $this->assertSame("some content", $this->generator->baz);
    }

    /** @test */
    public function get_data_from_providers_as_method(): void
    {
        $this->assertSame("other content", $this->generator->baz("other content"));
    }

    /** @test */
    public function invalid_argument_exception_when_inexistant_formatter(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->generator->i_actually_not_exist;
    }
}