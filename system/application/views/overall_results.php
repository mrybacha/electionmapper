<?php $ridingrow = $riding->row();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="election maps, election mapping, election results, federal election, realtime, google maps, election canada, <?php echo $ridingrow->edname.', '.$year?>" /> 
<meta name="description" content="Mapping Canadian federal election results for <?php echo $ridingrow->edname.' ('.$year?>) in real-time on a polling division level." />
<title>Overall Results - <?php echo $ridingrow->edname." (".$year?>)</title>
<link rel="stylesheet" href="/css/styles.css" type="text/css" />
<script type="text/javascript">
function dropdown(mySel)
{
var myWin, myVal;
myVal = mySel.options[mySel.selectedIndex].value;
if(myVal)
	{
	if(mySel.form.target)myWin = parent[mySel.form.target];
	else myWin = window;
	if (! myWin) return true;
	myWin.location = myVal;
	}
return false;
}

var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-19148467-1']);
  _gaq.push(['_trackPageview']);
 
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</head>

<body class="small-header">
	<div id="wrapper">
		<div id="sitename">
			<h1><a href="/">Election<strong>Mapper</strong></a></h1>
		</div>
       <div id="nav">
			<ul>
				<li><a href="/"><span>Home</span></a></li>
				<li><a href="/election/intro/<?php echo $year ."/". $ridingrow->fednum;?>"><span>Riding Intro</span></a></li>
                <li class="selected"><a href="/election/results/<?php echo $year ."/". $ridingrow->fednum;?>"><span>Results</span></a></li>
				<li><a href="/election/map/<?php echo $year ."/". $ridingrow->fednum;?>"><span>Map of Results</span></a></li>
				<li><a href="/maps/"><span>Electoral Maps</span></a></li>
				<li><a href="/election/about"><span>About</span></a></li>
			</ul>
		</div>

		<div id="header" class="clear">
			<?php echo "<h2>".$ridingrow->fednum." - ".$ridingrow->edname." (". $year .")</h2>"; ?>
		</div>
		<div id="body" class="clear">
			<div id="content">
              <h2>Overall Results</h2>

				<h3>Historical Election Results in <?php echo $year; ?></h3>
				<form method="post" action="" onsubmit="return dropdown(this.gourl)"><b>Poll-by-Poll Results:</b> <select name="gourl"><option value="">--SELECT--</option>
				<?php foreach ($query->result_array() as $row): ?>
				<option value="/election/results/<?php echo $year ."/". $ridingrow->fednum ."/". $row['poll']; ?>">
				<?php $pollnum = (int)$row['poll'];
				echo "Poll ".(($pollnum-($pollnum%10))/10)."-".($pollnum%10); ?>
				</option><?php endforeach; ?>
				</select> <input type="submit" value="View Results" /> | <a href="/election/map/<?php echo $year ."/". $ridingrow->fednum;?>">View Map</a></form><br />
				
				<table>
					<tr>
						<th>Candidate</th>
						<th>Party</th>
						<th>Votes</th>
						<th>Percent</th>
						<td rowspan="12"><img alt="pie chart of results" src="http://chart.apis.google.com/chart?chf=bg,s,00000000&chxs=0,000000,14&chxt=x&chs=500x250&chco=<?php foreach ($candidates->result_array() as $candidaterow):
						echo $candidaterow['colour'] ."|";
						endforeach;?>FFFFFF&cht=p&chd=t:<?php foreach ($candidates->result_array() as $candidaterow):
						echo number_format(($$candidaterow['col_name']/$voted*100),2).",";
						endforeach;
						echo number_format(($rejected/$voted*100),2);?>&chl=<?php foreach ($candidates->result_array() as $candidaterow):
						echo $candidaterow['short_name'] ."|";
						endforeach;?>Rejected" /></td>
					</tr>
					<?php foreach ($candidates->result_array() as $candidaterow): ?>
					<tr class="highlight">
						<td><?php echo strtoupper($candidaterow['last_name']) .", ". $candidaterow['first_name'];?></td>
						<td title="<?php echo $candidaterow['name'];?>"><?php echo $candidaterow['short_name'];?></td>
						<td class="right"><?php echo number_format($$candidaterow['col_name'],0,'.',',');?></td>
						<td class="right"><?php echo number_format(($$candidaterow['col_name']/$voted*100),2)."%"?></td>
					</tr>
					<?php endforeach;?>
					<tr class="highlight">
						<td></td>
						<td>Rejected</td>
						<td class="right"><?php echo number_format($rejected,0,'.',',');?></td>
						<td class="right"><?php echo number_format(($rejected/$voted*100),2)."%"?></td>
					</tr>
					<tr>
						<td></td>
						<td id="total">Total Votes Cast</td>
						<td id="total" class="right"><?php echo number_format($voted,0,'.',',');?></td>
						<td id="total" class="right"><?php echo number_format(($voted/$totalvoters*100),2)."%"?></td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td>Registered Voters</td>
						<td class="right"><?php echo number_format($totalvoters,0,'.',',');?></td>
						<td></td>
					</tr>
				</table>
				<p><a href="/election/intro/<?php echo $year ."/". $ridingrow->fednum;?>">back</a></p>
			</div>
		</div>
	</div>
    <?php $this->load->view('footer_view'); ?>