<?php $ridingrow = $riding->row();

// Creates an array of strings to hold the lines of the KML file.
$kml = array('<?xml version="1.0" encoding="UTF-8"?>');
$kml[] = '<kml xmlns="http://www.opengis.net/kml/2.2">';
$kml[] = '<Document>';
$kml[] = '  <name>'.$ridingrow->fednum.' - '.$ridingrow->edname.' ('.$year.')</name>';
$kml[] = '  <description><![CDATA['.$year.' Polling Divisions for '.$ridingrow->fednum.']]></description>';

// Create colour scheme for each party/candidate in the riding
foreach ($candidates->result_array() as $candidaterow):
$kml[] = '  <Style id="'.$candidaterow['col_name'].'20">';
$kml[] = '    <LineStyle>';
$kml[] = '      <color>FF000000</color>';
$kml[] = '      <width>1</width>';
$kml[] = '    </LineStyle>';
$kml[] = '    <PolyStyle>';
$colourarray = str_split($candidaterow['colour'], 2);
$kml[] = '      <color>73'.$colourarray[2].''.$colourarray[1].''.$colourarray[0].'</color>';
$kml[] = '      <fill>1</fill>';
$kml[] = '      <outline>1</outline>';
$kml[] = '    </PolyStyle>';
$kml[] = '  </Style>';

$kml[] = '  <Style id="'.$candidaterow['col_name'].'10">';
$kml[] = '    <LineStyle>';
$kml[] = '      <color>FF000000</color>';
$kml[] = '      <width>1</width>';
$kml[] = '    </LineStyle>';
$kml[] = '    <PolyStyle>';
$colourarray = str_split($candidaterow['colour1'], 2);
$kml[] = '      <color>73'.$colourarray[2].''.$colourarray[1].''.$colourarray[0].'</color>';
$kml[] = '      <fill>1</fill>';
$kml[] = '      <outline>1</outline>';
$kml[] = '    </PolyStyle>';
$kml[] = '  </Style>';

$kml[] = '  <Style id="'.$candidaterow['col_name'].'5">';
$kml[] = '    <LineStyle>';
$kml[] = '      <color>FF000000</color>';
$kml[] = '      <width>1</width>';
$kml[] = '    </LineStyle>';
$kml[] = '    <PolyStyle>';
$colourarray = str_split($candidaterow['colour2'], 2);
$kml[] = '      <color>73'.$colourarray[2].''.$colourarray[1].''.$colourarray[0].'</color>';
$kml[] = '      <fill>1</fill>';
$kml[] = '      <outline>1</outline>';
$kml[] = '    </PolyStyle>';
$kml[] = '  </Style>';

$kml[] = '  <Style id="'.$candidaterow['col_name'].'0">';
$kml[] = '    <LineStyle>';
$kml[] = '      <color>FF000000</color>';
$kml[] = '      <width>1</width>';
$kml[] = '    </LineStyle>';
$kml[] = '    <PolyStyle>';
$colourarray = str_split($candidaterow['colour3'], 2);
$kml[] = '      <color>73'.$colourarray[2].''.$colourarray[1].''.$colourarray[0].'</color>';
$kml[] = '      <fill>1</fill>';
$kml[] = '      <outline>1</outline>';
$kml[] = '    </PolyStyle>';
$kml[] = '  </Style>';
endforeach;

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

$kml[] = '  <Style id="tie">';
$kml[] = '    <LineStyle>';      
$kml[] = '      <color>FF000000</color>';
$kml[] = '      <width>1</width>';       
$kml[] = '    </LineStyle>';      
$kml[] = '    <PolyStyle>'; 
$kml[] = '      <color>73FFFFFF</color>';
$kml[] = '      <fill>1</fill>';         
$kml[] = '      <outline>1</outline>';
$kml[] = '    </PolyStyle>';          
$kml[] = '  </Style>'; 

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
		$max = 0;
		$max2 = 0;
		foreach ($candidates->result_array() as $candidaterow):
			if ((int)$divisionrow->$candidaterow['col_name']>$max)
			{
				$max2 = $max;
				$max = $divisionrow->$candidaterow['col_name'];
			}
			elseif ((int)$divisionrow->$candidaterow['col_name']>$max2)
				$max2 = (int)$divisionrow->$candidaterow['col_name'];					
		endforeach;
		if ($max==$max2)
			$kml[] = '    <styleUrl>#tie</styleUrl>';
		else
		{
			foreach ($candidates->result_array() as $candidaterow):
				if ((int)$divisionrow->$candidaterow['col_name']==$max)
				{
					$margin = ($max-$max2)/$divisionrow->voted*100;
					if ($margin<5)
						$kml[] = '    <styleUrl>#'.$candidaterow['col_name'].'0</styleUrl>';
					else if ($margin<10)
						$kml[] = '    <styleUrl>#'.$candidaterow['col_name'].'5</styleUrl>';
					else if ($margin<20)
						$kml[] = '    <styleUrl>#'.$candidaterow['col_name'].'10</styleUrl>';
					else
						$kml[] = '    <styleUrl>#'.$candidaterow['col_name'].'20</styleUrl>';
				}
			endforeach;
		}
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
