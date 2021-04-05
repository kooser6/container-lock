<?php declare(strict_types=1);

namespace Omatamix\Container\Test;

use Omatamix\Container\Container;
use Omatamix\Container\Exception\ContainerException;
use PHPUnit\Framework\TestCase;

/**
 * Test the container builder.
 */
class BuilderTest extends TestCase
{
    /**
     * @return void Returns nothing.
     */
    public function testString(): void
    {
        $this->expectException(ContainerException::class);
        $builder = new Container(new Baz());
    }
}
