<?php
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
     * @throws Exception
     */
    public function __toString()
    {
        $members = $this->toArray();
        var_dump($members);
        $export = Graphviz::create();
    }
}
