<?php
class Migration extends Admin_Controller{
	
	public function __construct (){
		parent::__construct();
	}

	//Load this controller if you wnat your migration to take affect
	public function index (){
		$this->load->library('migration');
		if (! $this->migration->current()) {
			show_error($this->migration->error_string());
		}
		else {
			echo 'Migration worked!';
		}
	
	}

}