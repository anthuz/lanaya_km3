<?php
/**
* Standard controller layout.
*
* @package LanayaControllers
*/
class CCIndex extends CObject implements IController {

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();
	}
   
   /**
    * Implementing interface IController. All controllers must have an index action.
    */
    public function Index() {
    	$this->data['title'] = "The Index Controller";
      	$this->data['main'] = "<h2>Welcome to Lanaya framework!</h2><br/><img src='http://athu.se/lanaya_dota2.jpg' alt='Lanaya' height='700' width='400' />";
      	$this->data['footer'] = "© Lanaya by Andreas Thuresson";
    }

} 