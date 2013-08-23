<?php
/**
 * Created by JetBrains PhpStorm.
 * User: vadym
 * Date: 8/23/13
 * Time: 1:20 PM
 * To change this template use File | Settings | File Templates.
 */
namespace x_breakpoint;
class Controller_Breakpoint extends \AbstractController {

    public $model_class = 'x_breakpoint/Model_Breakpoint';
    public $unique_id_prefix = 'breakpoint_';
    public $unique_id = null;
    public $frame_width = '1200px';

    function init() {
        parent::init();
        if ($this->api->page == 'trace') return;
        $this->api->breakpoint = $this;
        if (!$this->unique_id) {
            $this->unique_id = uniqid($this->unique_id_prefix);
        }

        // button
        $b = $this->api->add('Button')->set('View Trace');
        $b
          ->addStyle('position','fixed')
          ->addStyle('top','0')
          ->addStyle('right','0')
        ;
        $b->js('click')->univ()->frameURL('BackTrace',
            $this->api->url('trace',array('unique_id'=>$this->unique_id)),
            array('width'=>$this->frame_width)
        );
    }
    function addBreakpoint($name) {
        $m = $this->add($this->model_class);
        $m->set('name',$name);
        $m->set('trace',$this->getTraceJSON());
        $m->set('unique_id',$this->unique_id);
        $m->saveAndUnload();
    }
    public $current_trace = array();
    public $trace_count = 0;
    function getTrace() {
        foreach (debug_backtrace() as $k=>$v) {
            $this->getTraceInfo($v);
        }
        $ret = $this->current_trace;
        $this->current_trace = array();
        $this->trace_count = 0;
        return $ret;
    }
    function getTraceInfo($array) {
        foreach ($array as $name => $value) {
            if ($name != 'object' && $name != 'args') {
                $this->current_trace[$this->trace_count][$name] = $value;
            }
        }
        $this->trace_count++;
    }
    function getTraceJSON() {
        return json_encode($this->getTrace());
    }
}