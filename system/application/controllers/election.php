<?php

class Election extends Controller {

	function Election()
	{
		parent::Controller();
		$this->load->library('session');
		$this->load->helper('url_helper');
		$this->load->helper('form_helper');
	}

	function index()
	{
		//$year = $this->uri->segment(2);
		//$fednum = $this->uri->segment(3);
		//$DB = $this->load->database('2008', TRUE);
		//$DB_2006 = $this->load->database('2006', TRUE);
		//$DB_2004 = $this->load->database('2004', TRUE);
		//$this->load->database('2008');
		//$data['query'] = $DB->get('10001_results');
		//$data['riding'] = $DB->query('SELECT * FROM ridings WHERE fednum=10001');
		$this->load->view('home_page');
	}

	function intro()
	{
		$year = $this->uri->segment(3);
		$fednum = $this->uri->segment(4);
		$DB = $this->load->database($year, TRUE);
		$data['query'] = $DB->get($fednum.'_results');
		$data['riding'] = $DB->query('SELECT * FROM ridings WHERE fednum='.$fednum);
		$data['year'] = $year;
		$this->load->view('intro_view', $data);
	}
	
	function map()
	{
		$this->load->library('zip');
		$year = $this->uri->segment(3);
		$fednum = $this->uri->segment(4);
		$DB = $this->load->database($year, TRUE);
		$data['query'] = $DB->get($fednum.'_results');
		$data['riding'] = $DB->query('SELECT * FROM ridings WHERE fednum='.$fednum);
		$data['year'] = $year;
		$data['candidates'] = $DB->query('SELECT * FROM '.$fednum.'_candidates INNER JOIN parties ON '.$fednum.'_candidates.party_id=parties.id ORDER BY '.$fednum.'_candidates.last_name');
		$candidates = $DB->query('SELECT * FROM '.$fednum.'_candidates INNER JOIN parties ON '.$fednum.'_candidates.party_id=parties.id ORDER BY '.$fednum.'_candidates.last_name');
		foreach ($candidates->result_array() as $candidaterow):
			$sumquery = $DB->query("SELECT SUM(".$candidaterow['col_name'].") AS ".$candidaterow['col_name']." FROM ".$fednum."_results");
			$sumrow = $sumquery->row();
			$data[$candidaterow['col_name']] = $sumrow->$candidaterow['col_name'];
		endforeach;
		$sumquery = $DB->query("SELECT SUM(rejected) AS rejected, SUM(voted) AS voted, SUM(totalvoters) AS totalvoters FROM ".$fednum."_results");
		$sumrow = $sumquery->row();
		$data['rejected'] = $sumrow->rejected;
		$data['voted'] = $sumrow->voted;
		$data['totalvoters'] = $sumrow->totalvoters;
		if ($this->uri->segment(5)=='kml')
			$this->load->view('map_view2', $data);
		elseif ($this->uri->segment(5) == 'kml2')
			$this->load->view('map_view3', $data);
		elseif ($this->uri->segment(5) == 'kml3')
			$this->load->view('map_view4', $data);
		elseif ($this->uri->segment(5) == 'full')
			$this->load->view('full_view', $data);
		else $this->load->view('map_view', $data);
	}
	
	function results()
	{
		$year = $this->uri->segment(3);
		$fednum = $this->uri->segment(4);
		$data['year'] = $year;
		$DB = $this->load->database($year, TRUE);
		$data['query'] = $DB->get($fednum.'_results');
		$data['riding'] = $DB->query('SELECT * FROM ridings WHERE fednum='.$fednum);
		$data['candidates'] = $DB->query('SELECT * FROM '.$fednum.'_candidates INNER JOIN parties ON '.$fednum.'_candidates.party_id=parties.id ORDER BY '.$fednum.'_candidates.last_name');
		$candidates = $DB->query('SELECT * FROM '.$fednum.'_candidates INNER JOIN parties ON '.$fednum.'_candidates.party_id=parties.id ORDER BY '.$fednum.'_candidates.last_name');
		if ($this->uri->segment(5))
		{
			$data['poll'] = $this->uri->segment(5);

			foreach ($candidates->result_array() as $candidaterow):
				$sumquery = $DB->query("SELECT ".$candidaterow['col_name']." FROM ".$fednum."_results WHERE poll=".$this->uri->segment(5));
				$sumrow = $sumquery->row();
				$data[$candidaterow['col_name']] = $sumrow->$candidaterow['col_name'];
			endforeach;
			
			$sumquery = $DB->query("SELECT station_name, rejected, voted, totalvoters FROM ".$fednum."_results WHERE poll=".$this->uri->segment(5));
			$sumrow = $sumquery->row();
			$data['rejected'] = $sumrow->rejected;
			$data['voted'] = $sumrow->voted;
			$data['totalvoters'] = $sumrow->totalvoters;
			$data['station_name'] = $sumrow->station_name;

			$this->load->view('results_view', $data);
		} else {

			foreach ($candidates->result_array() as $candidaterow):
				$sumquery = $DB->query("SELECT SUM(".$candidaterow['col_name'].") AS ".$candidaterow['col_name']." FROM ".$fednum."_results");
				$sumrow = $sumquery->row();
				$data[$candidaterow['col_name']] = $sumrow->$candidaterow['col_name'];
			endforeach;
			
			$sumquery = $DB->query("SELECT SUM(rejected) AS rejected, SUM(voted) AS voted, SUM(totalvoters) AS totalvoters FROM ".$fednum."_results");
			$sumrow = $sumquery->row();
			$data['rejected'] = $sumrow->rejected;
			$data['voted'] = $sumrow->voted;
			$data['totalvoters'] = $sumrow->totalvoters;

			$this->load->view('overall_results', $data);
		}
	}
	
	function about()
	{
		$this->load->view('about_us');
	}
}
?>
