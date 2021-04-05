<?php declare(strict_types=1);

namespace Omatamix\Container\Test;

use Omatamix\Container\BuilderInterface;
use Omatamix\Container\Container;
use Omatamix\Container\Exception\ContainerException;
use PHPUnit\Framework\TestCase;

/**
 * Test class.
 */
class Baz implements BuilderInterface
{
}

/**
 * Test the container builder.
 */
class PsrExceptionTest extends TestCase
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
