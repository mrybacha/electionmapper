<?php

class Home extends Controller {

	function Home()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->load->view('home_page');
	}
}

/* End of file home.php */
/* Location: ./system/application/controllers/home.php */