<?php declare(strict_types=1);

namespace Omatamix\Container\Test;

use Omatamix\Container\ContainerBuilder;
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
        $builder = new ContainerBuilder();
        $builder['name'] = 'Nicholas';
        $this->assertEquals($builder['name'], 'Nicholas');
        unset($builder['name']);
        $this->assertTrue(isset($builder['name']));
    }
}
