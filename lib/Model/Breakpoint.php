<?php
/**
 * Created by JetBrains PhpStorm.
 * User: vadym
 * Date: 8/23/13
 * Time: 6:33 PM
 * To change this template use File | Settings | File Templates.
 */
namespace x_breakpoint;
class Model_Breakpoint extends \Model_Table {
    public $table = 'breakpoint';
    function init() {
        parent::init();
        $this->addField('name');
        $this->addField('trace')->type('text');
        $this->addField('unique_id');
        $this->addField('created_dts');

        $this->addHook('beforeInsert', function($m,$q){
        	$q->set('created_dts', $q->expr('now()'));
        });
    }
}