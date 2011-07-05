<?php $ridingrow = $riding->row();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="election maps, election mapping, election results, federal election, realtime, google maps, election canada, <?php echo $ridingrow->edname.', '.$year?>" /> 
<meta name="description" content="Mapping Canadian federal election results for <?php echo $ridingrow->edname.' ('.$year?>) in real-time on a polling division level." />
<title>Riding Introduction - <?php echo $ridingrow->edname." (".$year?>)</title>
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
				<li class="selected"><a href="/election/intro/<?php echo $year ."/". $ridingrow->fednum;?>"><span>Riding Intro</span></a></li>
                <li><a href="/election/results/<?php echo $year ."/". $ridingrow->fednum;?>"><span>Results</span></a></li>
				<li><a href="/election/map/<?php echo $year ."/". $ridingrow->fednum;?>"><span>Map of Results</span></a></li>
				<li><a href="/maps/"><span>Electoral Maps</span></a></li>
				<li><a href="/election/about"><span>About</span></a></li>
			</ul>
		</div>

		<div id="header" class="clear">
			<?php echo "<h2>".$ridingrow->fednum." - ".$ridingrow->edname." (". $year .")</h2>"; ?>
		</div>
		<div id="body" class="clear">
		
			<div id="content" style="position:relative">
				<!--<img src="/maps/<?php echo $ridingrow->provshort ."/". $ridingrow->fednum?>.gif" style="height:100%;position:absolute;right:10px;z-index:-1;opacity:0.4;filter:alpha(opacity=40);" />-->
              <h2>Riding Introduction</h2>

				<h3>Historical Election Results in <?php echo $year; ?></h3>
				<p><a href="/election/results/<?php echo $year ."/". $ridingrow->fednum;?>">Official Voting Results</a> | <a href="/election/map/<?php echo $year ."/". $ridingrow->fednum;?>">View Map of Results</a>
				<form method="post" action="" onsubmit="return dropdown(this.gourl)">Poll-by-Poll Results: <select name="gourl"><option value="">--SELECT--</option>
				<?php foreach ($query->result_array() as $row): ?>
				<option value="/election/results/<?php echo $year ."/". $ridingrow->fednum ."/". $row['poll']; ?>">
				<?php $pollnum = (int)$row['poll'];
				echo "Poll ".(($pollnum-($pollnum%10))/10)."-".($pollnum%10); ?>
				</option>
				<?php endforeach; ?>
				</select> <input type="submit" value="View Results" /></form></p>
					
				<h3>Electoral District Profile</h3>
				<?php echo "<div><p>The electoral district of ". $ridingrow->edname ." (". $ridingrow->prov .") covers an area of ". number_format($ridingrow->area,0,'.',',') ." km<sup>2</sup>, and has a population of ". number_format($ridingrow->population,0,'.',',') ." with ". number_format($ridingrow->voters,0,'.',',') ." registered voters and ". number_format($query->num_rows(),0,'.',',') ." polling divisions.</p>";
				echo $ridingrow->desc;
				echo "</div>"; ?>
				
				<h3>Downloads</h3>
				<ul>
				<li>Boundary Map (<a href="/maps/<? echo $ridingrow->provshort ."/". $ridingrow->fednum; ?>.gif">gif</a> | <a href="/maps/<? echo $ridingrow->provshort ."/". $ridingrow->fednum; ?>.pdf">pdf</a>)</li>
				<li>Poll-by-Poll Results Raw Data (<a href="/raw_data/<? echo $year ."/". $ridingrow->provshort ."/pollbypoll_bureauparbureau". $ridingrow->fednum; ?>.csv">csv</a>)</li>
				<li>Statistics (<a href="http://www12.statcan.ca/census-recensement/2006/dp-pd/prof/92-595/P2C.cfm?TPL=RETR&LANG=E&GC=<? echo $ridingrow->fednum ?>">Statistics Canada</a> | <a href="http://www.bcstats.gov.bc.ca/data/cen06/profiles/detail_b/FED<? echo $ridingrow->fednum ?>.pdf">BC Stats</a>)</li>
				</ul>
			</div>
		</div>
	</div>
    <?php $this->load->view('footer_view'); ?>