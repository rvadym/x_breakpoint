<?php
/**
 * Created by JetBrains PhpStorm.
 * User: vadym
 * Date: 8/23/13
 * Time: 1:22 PM
 * To change this template use File | Settings | File Templates.
 */
namespace x_breakpoint;
class Grid_Breakpoint extends \Grid_Advanced {
    function init() {
        parent::init();
        $this->addColumn('class');
        $this->addColumn('line');
        $this->addColumn('function');
        $this->addColumn('file');
    }
}