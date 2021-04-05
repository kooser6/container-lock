<?php declare(strict_types=1);

namespace Omatamix\Container\Test;

use Omatamix\Container\Container;
use Omatamix\Container\ContainerBuilder;
use PHPUnit\Framework\TestCase;

/**
 * Test class.
 */
class Foo
{
    public $num = 5;
}

/**
 * Test class.
 */
class Bar
{
    public $num = 9;
}

/**
 * Test class.
 */
class Dos
{
    private $foo;
    private $bar;
    
    public function __construct(Foo $foo, Bar $bar)
    {
        $this->foo = $foo;
        $this->bar = $bar;
    }

    public function add()
    {
        return $foo->num + $bar->num;
    }
}

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

    /**
     * @return void Returns nothing.
     */
    public function testInt(): void
    {
        $builder = new ContainerBuilder();
        $builder['num'] = 1;
        $this->assertEquals($builder['num'], 1);
        $this->assertTrue(isset($builder['num']));
        unset($builder['num']);
        $this->assertTrue(!isset($builder['num']));
        $builder['num1'] = 1;
        $builder['num2'] = 2;
        $psrContainer = new Container($builder);
        $this->assertTrue($psrContainer->has('num1'));
        $this->assertTrue($psrContainer->has('num2'));
        $this->assertEquals($psrContainer->get('num1'), 1);
        $this->assertEquals($psrContainer->get('num2'), 2);
        $this->assertTrue(!$psrContainer->has('randomId'));
    }

    /**
     * @return void Returns nothing.
     */
    public function testFloat(): void
    {
        $builder = new ContainerBuilder();
        $builder['float'] = 1.11;
        $this->assertEquals($builder['float'], 1.11);
        $this->assertTrue(isset($builder['float']));
        unset($builder['float']);
        $this->assertTrue(!isset($builder['float']));
        $builder['float1'] = 1.11;
        $builder['float2'] = 2.22;
        $psrContainer = new Container($builder);
        $this->assertTrue($psrContainer->has('float1'));
        $this->assertTrue($psrContainer->has('float2'));
        $this->assertEquals($psrContainer->get('float1'), 1.11);
        $this->assertEquals($psrContainer->get('float2'), 2.22);
        $this->assertTrue(!$psrContainer->has('randomId'));
    }

    /**
     * @return void Returns nothing.
     */
    public function testService(): void
    {
        $builder = new ContainerBuilder();
        $builder['foo'] = $builder->service(function ($c) {
            return new Foo();
        });
        $this->assertTrue(isset($builder['foo']));
        // $this->assertEquals($builder['foo']->num, 5);
        $builder['bar'] = $builder->service(function ($c) {
            return new Bar();
        });
        $this->assertTrue(isset($builder['bar']));
        // $this->assertEquals($builder['bar']->num, 9);
        $builder['dos'] = $builder->service(function ($c) {
            return new Bar($c['foo'], $c['bar']);
        });
        $this->assertTrue(isset($builder['bar']));
        $this->assertEquals($builder['dos']->add(), 14);
    }
}
