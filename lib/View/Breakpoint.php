<?php
/**
 * Created by JetBrains PhpStorm.
 * User: vadym
 * Date: 8/23/13
 * Time: 1:23 PM
 * To change this template use File | Settings | File Templates.
 */
namespace x_breakpoint;
class View_Breakpoint extends \AbstractView {
    public $points = array();

    function render(){
        /*
   		$this->js(true)
   			->_load('x_tags')
   			->_css('x_tags');
        */
   		return parent::render();
   	}
    function defaultTemplate() {
		// add add-on locations to pathfinder
		$l = $this->api->locate('addons',__NAMESPACE__,'location');
		$addon_location = $this->api->locate('addons',__NAMESPACE__);
		$this->api->pathfinder->addLocation($addon_location,array(
			//'js'=>'templates/js',
			//'css'=>'templates/css',
            //'template'=>'templates',
		))->setParent($l);

        //return array('view/lister/tags');
        return parent::defaultTemplate();
    }
}