<?php declare(strict_types=1);

namespace Omatamix\Container\Test;

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
        $builder = ContainerBuilder();
        $builder['name'] = 'Nicholas';
        $this->assertEquals($builder['name'], 'Nicholase');
        unset($builder['name']);
        $this->assertTrue(isset($builder['name']));
    }
}
