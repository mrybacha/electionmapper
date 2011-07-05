<?php $ridingrow = $riding->row();

// Creates an array of strings to hold the lines of the KML file.
$kml = array('<?xml version="1.0" encoding="UTF-8"?>');
$kml[] = '<kml xmlns="http://www.opengis.net/kml/2.2">';
$kml[] = '<Document>';
$kml[] = '  <name>'.$ridingrow->fednum.' - '.$ridingrow->edname.' ('.$year.')</name>';
$kml[] = '  <description><![CDATA['.$year.' Polling Divisions for '.$ridingrow->fednum.']]></description>';

//color styles for various voter turn out states
$kml[] = '  <Style id="novotes">';
$kml[] = '    <LineStyle>';
$kml[] = '      <color>FF000000</color>';
$kml[] = '      <width>1</width>';
$kml[] = '    </LineStyle>';
$kml[] = '    <PolyStyle>';
$kml[] = '      <color>00000000</color>';
$kml[] = '      <fill>1</fill>';
$kml[] = '      <outline>1</outline>';
$kml[] = '    </PolyStyle>';
$kml[] = '  </Style>';
//Colorstyle when value is from 0 to 9.5
$kml[] = '  <Style id="0to10">';
$kml[] = '    <LineStyle>';      
$kml[] = '      <color>FF000000</color>';
$kml[] = '      <width>1</width>';       
$kml[] = '    </LineStyle>';      
$kml[] = '    <PolyStyle>'; 
$kml[] = '      <color>730000FF</color>';
$kml[] = '      <fill>1</fill>';         
$kml[] = '      <outline>1</outline>';
$kml[] = '    </PolyStyle>';          
$kml[] = '  </Style>'; 
//Colorstyle when value is from 9.5 to 19.5
$kml[] = '  <Style id="10to20">';
$kml[] = '    <LineStyle>';
$kml[] = '      <color>FF000000</color>';
$kml[] = '      <width>1</width>';
$kml[] = '    </LineStyle>';
$kml[] = '    <PolyStyle>';
$kml[] = '      <color>73007FFF</color>';
$kml[] = '      <fill>1</fill>';
$kml[] = '      <outline>1</outline>';
$kml[] = '    </PolyStyle>';
$kml[] = '  </Style>';
//Colorstyle when value is from 19.5 to 34.5
$kml[] = '  <Style id="20to35">'; 
$kml[] = '    <LineStyle>';      
$kml[] = '      <color>FF000000</color>';
$kml[] = '      <width>1</width>';       
$kml[] = '    </LineStyle>';      
$kml[] = '    <PolyStyle>'; 
$kml[] = '      <color>7300FF7F</color>';
$kml[] = '      <fill>1</fill>';         
$kml[] = '      <outline>1</outline>';
$kml[] = '    </PolyStyle>';          
$kml[] = '  </Style>'; 
//Colorstyle when value is from 34.5 to 100
$kml[] = '  <Style id="35to100">'; 
$kml[] = '    <LineStyle>';      
$kml[] = '      <color>FF000000</color>';
$kml[] = '      <width>1</width>';       
$kml[] = '    </LineStyle>';      
$kml[] = '    <PolyStyle>'; 
$kml[] = '      <color>7300FF00</color>';
$kml[] = '      <fill>1</fill>';         
$kml[] = '      <outline>1</outline>';
$kml[] = '    </PolyStyle>';          
$kml[] = '  </Style>'; 

//populates the poll with correct coloring and information in the map bubble
foreach ($query->result() as $divisionrow)
{
	$pollnum = (int)$divisionrow->poll;
	$kml[] = '  <Placemark>';
	$kml[] = '    <name><![CDATA[<h1>Poll '.(($pollnum-($pollnum%10))/10)."-".($pollnum%10).' - '.$divisionrow->station_name.'</h1>]]></name>';
	if ((int)$divisionrow->voted==0)
	{
		$kml[] = '      <description><![CDATA[<hr><p>Results have not yet been tabulated for this poll division. Please try again later.</p>]]></description>';
		$kml[] = '    <styleUrl>#novotes</styleUrl>';
	} else {
		$kml[] = '    <description><![CDATA[<table>
					<tr>
						<th>Candidate</th>
						<th>Party</th>
						<th>Votes</th>
						<th>Percent</th>';
		
		$kml[] = '  </tr>';
		foreach ($candidates->result_array() as $candidaterow):
			$kml[] = '    	<tr class="highlight">
						<td>'.strtoupper($candidaterow['last_name']) .', '. $candidaterow['first_name'].'</td>
						<td title="'.$candidaterow['name'].'">'.$candidaterow['short_name'].'</td>
						<td align="right">'.number_format($divisionrow->$candidaterow['col_name'],0,'.',',').'</td>
						<td align="right">'.number_format(($divisionrow->$candidaterow['col_name']/$divisionrow->voted*100),2).'%</td>
					</tr>';
		endforeach;
		$kml[] = '  <tr class="highlight">
						<td></td>
						<td>Rejected</td>
						<td align="right">'.number_format($divisionrow->rejected,0,'.',',').'</td>
						<td align="right">'.number_format(($divisionrow->rejected/$divisionrow->voted*100),2).'%</td>
					</tr>
					<tr>
						<td></td>
						<td style="border-top:3px solid #000000">Total Votes Cast</td>
						<td style="border-top:3px solid #000000" align="right">'.number_format($divisionrow->voted,0,'.',',').'</td>
						<td style="border-top:3px solid #000000" align="right">'.number_format(($divisionrow->voted/$divisionrow->totalvoters*100),2).'%</td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td>Registered Voters</td>
						<td align="right">'.number_format($divisionrow->totalvoters,0,'.',',').'</td>
						<td></td>
					</tr>
					<tr><td colspan="4">';
		$img = array('<img alt="pie chart of results" src="http://chart.apis.google.com/chart?chf=bg,s,00000000&chxs=0,000000,14&chxt=x&chs=400x150&chco=');
		foreach ($candidates->result_array() as $candidaterow):
			$img[] = $candidaterow['colour'].'|';
		endforeach;
		$img[] = 'FFFFFF&cht=p&chd=t:';
		foreach ($candidates->result_array() as $candidaterow):
			$img[] = number_format(($divisionrow->$candidaterow['col_name']/$divisionrow->voted*100),2).',';
		endforeach;
		$img[] = number_format(($divisionrow->rejected/$divisionrow->voted*100),2).'&chl=';
		foreach ($candidates->result_array() as $candidaterow):
			$img[] = $candidaterow['short_name'] .'|';
		endforeach;
		$img[] = 'Rejected" />';
		$kml[] = join($img);
		$kml[] = '		</tr></table>]]></description>';
		
		// Find the candidate with the most and second most votes, and compare the difference
		$turnout = $divisionrow->voted/$divisionrow->totalvoters;
		$goodvote = $divisionrow->conservative/$divisionrow->voted;
		$goodresult = ($turnout*$goodvote*100)-pow(((1-$goodvote)*$turnout),2)-((1-$turnout)*$goodvote);
		if ($goodresult<9.5)
			$kml[] = '    <styleUrl>#0to10</styleUrl>';
		else if ($goodresult<19.5)
			$kml[] = '    <styleUrl>#10to20</styleUrl>';
		else if ($goodresult<34.5)
			$kml[] = '    <styleUrl>#20to35</styleUrl>';
		else
			$kml[] = '    <styleUrl>#35to100</styleUrl>';
	}
	$kml[] = '    '.$divisionrow->coordinate;
	$kml[] = '  </Placemark>';
}

$kml[] = '</Document>';
$kml[] = '</kml>';
$kmlOutput = join("\n", $kml);
$name = 'kml.kml';
$this->zip->add_data($name, $kmlOutput);
$this->zip->download('kmz');
//header('Content-type: application/vnd.google-earth.kml+xml');
//echo $kmlOutput;
?>
