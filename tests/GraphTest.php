<?php
/**
 * GraphViz export test
 *
 * @category  Test
 * @package   oreolek\GraphViz\Tests
 * @author    Alexander Yakovlev <keloero@oreolek.ru>
 * @copyright 2018 Alexander Yakovlev
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/oreolek/graphviz
 */
namespace oreolek\GraphViz\Tests;

use \oreolek\GraphViz\Graph;
use \Pho\Lib\Graph\Node;

/**
 * GraphViz export test
 *
 * @category  Test
 * @package   oreolek\GraphViz\Tests
 * @author    Alexander Yakovlev <keloero@oreolek.ru>
 * @copyright 2018 Alexander Yakovlev
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/oreolek/graphviz
 * @coversDefaultClass \oreolek\GraphViz\Graph
 */
class GraphTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test that an incorrect graph returns Exception on export.
     *
     * @covers ::__toString
     * @return void
     */
    public function testStringException()
    {
        $graph = new Graph;
        $nodea = new Node($graph);
        $graph->add($nodea);

        $this->setExpectedException('Exception');
        $graph->__toString();
    }

    /**
     * Test that the graph returns a DOT graph on toString() method.
     *
     * @covers ::__toString
     * @return void
     */
    public function testToString()
    {
        $graph = new Graph;
        $this->assertSame(
            (string) $graph,
            ('digraph "My First Graph" {' . PHP_EOL . PHP_EOL . '}')
        );

        $graph->setLabel('PigeonPost');
        $this->assertSame(
            (string) $graph,
            ('digraph "My First Graph" {' . PHP_EOL . 'label="PigeonPost"' . PHP_EOL . '}')
        );

        $graph->setStrict(true);
        $this->assertSame(
            (string) $graph,
            ('strict digraph "My First Graph" {' . PHP_EOL . 'label="PigeonPost"' . PHP_EOL . '}')
        );
    }
}
