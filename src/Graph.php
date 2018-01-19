<?php declare(strict_types=1);
/**
 * A subsitute class for pho-lib-graph with GraphViz export
 *
 * @category  Library
 * @package   oreolek\GraphViz
 * @author    Alexander Yakovlev <keloero@oreolek.ru>
 * @copyright 2018 Alexander Yakovlev
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/oreolek/graphviz
 */

namespace oreolek\GraphViz;

use \Pho\Lib\Graph\Graph as ParentGraph;
use \phpDocumentor\GraphViz\Graph as Graphviz;
use \phpDocumentor\GraphViz\Node as GraphvizNode;
use \phpDocumentor\GraphViz\Edge as GraphvizEdge;

/**
 * A substitute class for pho-lib-graph with GraphViz export
 *
 * @category  Library
 * @package   oreolek\GraphViz
 * @author    Alexander Yakovlev <keloero@oreolek.ru>
 * @copyright 2018 Alexander Yakovlev
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/oreolek/graphviz
 */
class Graph extends ParentGraph
{
    /**
     * Export to DOT format
     *
     * @return string
     */
    public function __toString()
    {
        $export = Graphviz::create((string) $this->id(), false); // unnamed unidirectional
        $members = $this->members();

        foreach ($members as $node) {
            $edges = $node->edges();
            $gnode = GraphvizNode::create((string) $node->id());
            $export->setNode($gnode);
            foreach ($edges as $edge) {
                $gedgenode = $export->findNode((string) $edge->id());
                if ($gedgenode === null) {
                    $gedgenode = GraphvizNode::create((string) $edge->id());
                    $export->setNode($gedgenode);
                }
                $gedge = GraphvizEdge::create($gnode, $gedgenode);
                $export->link($gedge);
            }
        }

        return $export->__toString();
    }
}
