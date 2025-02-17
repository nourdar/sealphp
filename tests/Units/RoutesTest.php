<?php
/**
 * Auther:RamyHakam
 * Date: 8/3/19
 */

namespace Tests\units;


use PHPUnit\Framework\TestCase;
use Symfony\Component\Routing\RouteCollection;


class RoutesTest extends TestCase
{
    /**
     * @var RouteCollection $routes
     */
    private $routes;

    /**
     * init the list of routes
     */
    protected function setUp(): void
    {
        $this->routes = include __DIR__ . '/../../src/router.php';

    }

    /**
     * Assert if All Routes has the same file names
     */
    public function testIFAllRoutesExist()
    {
        foreach ($this->routes->all() as $key => $route) {

            $render = $route->getDefault('_controller');

            $this->assertTrue(is_callable($render));
            $this->assertFileExists(__DIR__."/../../src/pages/{$key}" . ".php");
        }
    }
}