<?php
/**
 * Created by JetBrains PhpStorm.
 * User: vadym
 * Date: 8/23/13
 * Time: 5:17 PM
 * To change this template use File | Settings | File Templates.
 *

  window.open('url', 'window name', 'window settings')

  $('a#link_id').click(function(){
   window.open('url', 'window name', 'window settings');
   return false;
 });

 *
 *
 *
 */
class page_trace extends Page {
    public $model_class = 'x_breakpoint/Model_Breakpoint';
    public $grid_class = 'x_breakpoint/Grid_Breakpoint';
    function page_index() {
        $arr = $this->add($this->model_class)/*->debug()*/->addCondition('unique_id',$_GET['unique_id'])->getRows();

        foreach ($arr as $k=>$v) {
            $this->add('H4')->set($v['name']);
            $a = json_decode($v['trace'],true);
            $gr = $this->add($this->grid_class);
            $gr->setSource($a);
        }
    }
}