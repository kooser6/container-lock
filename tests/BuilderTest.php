<?php declare(strict_types=1);

namespace Omatamix\Container\Test;

use Omatamix\Container\Container;
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
        $this->assertTrue(isset($builder['name']));
        unset($builder['name']);
        $this->assertTrue(!isset($builder['name']));
        $builder['name'] = 'Nicholas';
        $builder['isDeveloper'] = 'Yes';
        $psrContainer = new Container($builder);
        $this->assertTrue($psrContainer->has('name'));
        $this->assertTrue($psrContainer->has('isDeveloper'));
        $this->assertEquals($psrContainer->get('name'), 'Nicholas');
        $this->assertEquals($psrContainer->get('isDeveloper'), 'Yes');
        $this->assertTrue(!$psrContainer->has('randomId'));
    }
}
