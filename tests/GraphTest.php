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
use \Pho\Lib\Graph\SubGraph;

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
     * Test that the graph returns a DOT graph on toString() method.
     *
     * @covers ::__toString
     * @return void
     */
    public function testToString()
    {
        $graph = new Graph;
        $nodea = new Node($graph);
        $nodeb = new Node($graph);
        $subgraph = new SubGraph($graph);
        $nodec = new Node($subgraph);
        $noded = new Node($subgraph);

        echo $graph;

        $this->assertSame(
            (string) $graph,
            ('graph "'.$graph->id().'" {' . PHP_EOL . '' . PHP_EOL . '}')
        );
    }
}
