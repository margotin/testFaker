<?php declare(strict_types=1);


namespace Nitogram\Faker\Tests\Fixtures\Providers;

use Nitogram\Faker\Providers\Base;

class Foo extends Base
{
    public function baz(?string $text = null): string
    {
        return $text ?? "some content";
    }
}