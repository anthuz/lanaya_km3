<?php
/**
* Holding a instance of CLanaya to enable use of $this in subclasses.
*
* @package LanayaSystem
*/
class CObject {
	 
	 /**
	 * Members
	 */
	public $config;
	public $request;
	public $data;
	public $db;    
	public $views;
	public $session;

	/**
	 * Constructor
	 */
	protected function __construct() {
		$lanaya = CLanaya::Instance();
		$this->config   = &$lanaya->config;
		$this->request  = &$lanaya->request;
		$this->data     = &$lanaya->data;
		$this->db       = &$lanaya->db;
		$this->views    = &$lanaya->views;
		$this->session  = &$lanaya->session;
	}
	
	/**
	 * Redirect to another url and store the session
	 */
	protected function RedirectTo($url) {
		$lanaya = CLanaya::Instance();
		if (isset($lanaya -> config['debug']['db-num-queries']) && $lanaya -> config['debug']['db-num-queries'] && isset($lanaya -> db)) {
			$this -> session -> SetFlash('database_numQueries', $this -> db -> GetNumQueries());
		}
		if (isset($lanaya -> config['debug']['db-queries']) && $lanaya -> config['debug']['db-queries'] && isset($lanaya -> db)) {
			$this -> session -> SetFlash('database_queries', $this -> db -> GetQueries());
		}
		if (isset($lanaya -> config['debug']['timer']) && $lanaya -> config['debug']['timer']) {
			$this -> session -> SetFlash('timer', $lanaya -> timer);
		}
		$this -> session -> StoreInSession();
		header('Location: ' . $this -> request -> CreateUrl($url));
	}
}