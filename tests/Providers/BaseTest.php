<?php declare(strict_types=1);


namespace Nitogram\Faker\Tests\Providers;

use Nitogram\Faker\Providers\Base;
use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{
    /** @test */
    public function get_a_random_element(): void
    {
        $haystack = ['truc', 'machin', 'chose', 'toto'];
        $random_element = Base::randomElement($haystack);

        $this->assertContains($random_element, $haystack);
    }
}