<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="election maps, election mapping, election results, federal election, realtime, google maps, election canada" /> 
<meta name="description" content="Mapping Canadian federal election results in real-time on a polling division level." />
<title>Election Mapper</title>
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
				<li class="selected"><a href="/"><span>Home</span></a></li>
				<li><a href="/election/intro/2008/10001"><span>Riding Intro</span></a></li>
                <li><a href="/election/results/2008/10001"><span>Results</span></a></li>
				<li><a href="/election/map/2008/10001"><span>Map of Results</span></a></li>
				<li><a href="/maps/"><span>Electoral Maps</span></a></li>
				<li><a href="/election/about"><span>About</span></a></li>
			</ul>
		</div>

		<div id="header" class="clear">
			<h2>Welcome</h2>
		</div>
		<div id="body" class="clear">
			<div id="content">
              <h2>Find Election Results</h2>
				<h3>40th General Election (2008)</h3>
				<!--<p>Choose an election event: <select name="event" onchange="edist.style.display = 'block';"><option value="">--SELECT--</option>
				<option value="2008">40th General Election (2008)</option>
				</select></p>-->
					
				<div id="edist"><form method="post" action="" onsubmit="return dropdown(this.gourl)">Choose an electoral district: <select name="gourl"><option value="">--SELECT--</option>
				<optgroup label="Newfoundland and Labrador">
				<option value="/election/intro/2008/10001">Avalon</option>
				<option value="/election/intro/2008/10002">Bonavista--Gander--Grand Falls--Windsor</option>
				<option value="/election/intro/2008/10003">Humber--St. Barbe--Baie Verte</option>
				<option value="/election/intro/2008/10004">Labrador</option>
				<option value="/election/intro/2008/10005">Random--Burin--St. George's</option>
				<option value="/election/intro/2008/10006">St. John's East</option>
				<option value="/election/intro/2008/10007">St. John's South--Mount Pearl</option>
				</optgroup>
				<optgroup label="Prince Edward Island">
				<option value="/election/intro/2008/11001">Cardigan</option>
				<option value="/election/intro/2008/11002">Charlottetown</option>
				<option value="/election/intro/2008/11003">Egmont</option>
				<option value="/election/intro/2008/11004">Malpeque</option>
				</optgroup>
				<optgroup label="British Columbia">
				<option value="/election/intro/2008/59001">Abbotsford</option> 
				<option value="/election/intro/2008/59026">British Columbia Southern Interior</option> 
				<option value="/election/intro/2008/59002">Burnaby--Douglas</option> 
				<option value="/election/intro/2008/59003">Burnaby--New Westminster</option> 
				<option value="/election/intro/2008/59004">Cariboo--Prince George</option> 
				<option value="/election/intro/2008/59005">Chilliwack--Fraser Canyon</option> 
				<option value="/election/intro/2008/59006">Delta--Richmond East</option> 
				<option value="/election/intro/2008/59008">Esquimalt--Juan de Fuca</option> 
				<option value="/election/intro/2008/59009">Fleetwood--Port Kells</option> 
				<option value="/election/intro/2008/59010">Kamloops--Thompson--Cariboo</option> 
				<option value="/election/intro/2008/59011">Kelowna--Lake Country</option> 
				<option value="/election/intro/2008/59012">Kootenay--Columbia</option> 
				<option value="/election/intro/2008/59013">Langley</option> 
				<option value="/election/intro/2008/59014">Nanaimo--Alberni</option> 
				<option value="/election/intro/2008/59015">Nanaimo--Cowichan</option> 
				<option value="/election/intro/2008/59017">New Westminster--Coquitlam</option> 
				<option value="/election/intro/2008/59016">Newton--North Delta</option> 
				<option value="/election/intro/2008/59019">North Vancouver</option> 
				<option value="/election/intro/2008/59020">Okanagan--Coquihalla</option> 
				<option value="/election/intro/2008/59018">Okanagan--Shuswap</option> 
				<option value="/election/intro/2008/59007">Pitt Meadows--Maple Ridge--Mission</option> 
				<option value="/election/intro/2008/59021">Port Moody--Westwood--Port Coquitlam</option> 
				<option value="/election/intro/2008/59022">Prince George--Peace River</option> 
				<option value="/election/intro/2008/59023">Richmond</option> 
				<option value="/election/intro/2008/59024">Saanich--Gulf Islands</option> 
				<option value="/election/intro/2008/59025">Skeena--Bulkley Valley</option> 
				<option value="/election/intro/2008/59027">South Surrey--White Rock--Cloverdale</option> 
				<option value="/election/intro/2008/59028">Surrey North</option> 
				<option value="/election/intro/2008/59029">Vancouver Centre</option> 
				<option value="/election/intro/2008/59030">Vancouver East</option> 
				<option value="/election/intro/2008/59031">Vancouver Island North</option> 
				<option value="/election/intro/2008/59032">Vancouver Kingsway</option> 
				<option value="/election/intro/2008/59033">Vancouver Quadra</option> 
				<option value="/election/intro/2008/59034">Vancouver South</option> 
				<option value="/election/intro/2008/59035">Victoria</option> 
				<option value="/election/intro/2008/59036">West Vancouver--Sunshine Coast--Sea to Sky</option> 
				</optgroup>
				<optgroup label="Yukon">
				<option value="/election/intro/2008/60001">Yukon</option>
				</optgroup>
				<optgroup label="Northwest Territories">
				<option value="/election/intro/2008/61001">Western Arctic</option>
				</optgroup>
				<optgroup label="Nunavut">
				<option value="/election/intro/2008/62001">Nunavut</option>
				</optgroup>
				</select> <input type="submit" value="View Electoral District" /></form></div>
				<p></p>
				<h2>41st General Election Standings in the House of Commons</h2>
				<table>
					<tr>
						<th> </th>
						<th>Total Seats</th>
						<th>BC</th>
						<th>AB</th>
						<th>SK</th>
						<th>MB</th>
						<th>ON</th>
						<th>QC</th>
						<th>NB</th>
						<th>PE</th>
						<th>NS</th>
						<th>NL</th>
						<th>YK</th>
						<th>NT</th>
						<th>NU</th>
						<th>Votes</th>
						<th>Percent</th>
						<th>Party</th>
					</tr>
					<tr class="highlight">
						<td bgcolor="#0000FF"> </td>
						<td><strong>166</strong></td>
						<td>21</td>
						<td>27</td>
						<td>13</td>
						<td>11</td>
						<td>73</td>
						<td>5</td>
						<td>8</td>
						<td>1</td>
						<td>4</td>
						<td>1</td>
						<td>1</td>
						<td> </td>
						<td>1</td>
						<td class="right">5,832,401</td>
						<td class="right">39.62%</td>
						<td>Conservative Party</td>
					</tr>
					<tr class="highlight">
						<td bgcolor="#FF8000"> </td>
						<td><strong>103</strong></td>
						<td>12</td>
						<td>1</td>
						<td> </td>
						<td>2</td>
						<td>22</td>
						<td>59</td>
						<td>1</td>
						<td> </td>
						<td>3</td>
						<td>2</td>
						<td> </td>
						<td>1</td>
						<td> </td>
						<td class="right">4,508,474</td>
						<td class="right">30.63%</td>
						<td>New Democratic Party</td>
					</tr>
					<tr class="highlight">
						<td bgcolor="#FF0000"> </td>
						<td><strong>34</strong></td>
						<td>2</td>
						<td> </td>
						<td>1</td>
						<td>1</td>
						<td>11</td>
						<td>7</td>
						<td>1</td>
						<td>3</td>
						<td>4</td>
						<td>4</td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td class="right">2,783,175</td>
						<td class="right">18.91%</td>
						<td>Liberal Party</td>
					</tr>
					<tr class="highlight">
						<td bgcolor="#00BBFF"> </td>
						<td><strong>4</strong></td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td>4</td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td class="right">889,788</td>
						<td class="right">6.04%</td>
						<td>Bloc Quebecois</td>
					</tr>
					<tr class="highlight">
						<td bgcolor="#009900"> </td>
						<td><strong>1</strong></td>
						<td>1</td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td class="right">576,221</td>
						<td class="right">3.91%</td>
						<td>Green Party</td>
					</tr>
					<tr class="highlight">
						<td bgcolor="#777777"> </td>
						<td><strong>0</strong></td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td class="right">130,521</td>
						<td class="right">0.89%</td>
						<td>Others</td>
					</tr>
					<tr>
						<td> </td>
						<td id="total"><strong>308</strong></td>
						<td id="total">36</td>
						<td id="total">28</td>
						<td id="total">14</td>
						<td id="total">14</td>
						<td id="total">106</td>
						<td id="total">75</td>
						<td id="total">10</td>
						<td id="total">4</td>
						<td id="total">11</td>
						<td id="total">7</td>
						<td id="total">1</td>
						<td id="total">1</td>
						<td id="total">1</td>
						<td id="total" class="right">14,720,580</td>
						<td id="total" class="right">100.00%</td>
						<td> </td>
					</tr>
				</table>
				<p><iframe frameborder="0" width="960px" height="900px" scrolling="no"  src="http://www.google.com/fusiontables/embedviz?viz=MAP&q=select+col0%2C+col1%2C+col2%2C+col3%2C+col4%2C+col5+from+788112+&h=false&lat=52.429222277955134&lng=-91.9775390625&z=4&t=1&l=col0"></iframe></p>
				<h2>News</h2>
				<p><b>May 15, 2011:</b> Added a table of the election standings on the home page.<br />
				<b>May 3, 2011:</b> Map with results from the 41st general election has been uploaded.<br />
				<b>Apr 10, 2011:</b> Added a downloads section to the riding intro pages and uploaded raw poll by poll data. I think these pages will be renamed to "riding information" after the election.<br />
				<b>Apr 6, 2011:</b> Linked the Elections Canada paper maps to the navigation, uploaded/linked an about me page, and simplified the electoral district menu above in light of the ongoing election and increased website traffic.<br />
				<b>Mar 24, 2011:</b> Clearly we are about to embark into a federal election. While I've been able to finish maps for the north, NL, PEI, and BC, this website is obviously no where as complete as I'd like it to be. I'd like to still keep the service available for those that will actually use it, so if you're interested in a specific riding that isn't currently available, please <?php echo safe_mailto('mike@electionmapper.ca', 'drop me a note');?>.<br />
				<b>Mar 13, 2011:</b> Voter turnout map overlay now available, located in the top right corner of each map, along with Conservative support vs. turnout.<br />
				<b>Feb 22, 2011:</b> Maps and results for BC are now online.<br />
				<b>Feb 12, 2011:</b> The location search box and the map overlay drop down menu have to repositioned to the top of the maps horizontally in order to accomodate Google's map API enhancements.<br />
				<b>Jan 30, 2011:</b> YK, NT, and NU maps are now up. I will start on BC next. If you have any requests for ridings to do first, please <?php echo safe_mailto('mike@electionmapper.ca', 'email');?> me.<br />
				<b>Jan 29, 2011:</b> PE maps are now up.<br />
				<b>Jan 28, 2011:</b> NL maps are up, as well as an archive of all of Elections Canada's paper maps at <a href="http://www.electionmapper.ca/maps/">http://www.electionmapper.ca/maps/</a><br />
				<b>Jan 23, 2011:</b> Added results data for the rest of the NL ridings. The geographical representations will come later.<br />
				<b>Jan 16, 2011:</b> Website framework completed, starting off data population with the 2008 40th General Election with the electoral district of Avalon (NL).</p>
			</div>
		</div>
	</div>
    <?php $this->load->view('footer_view'); ?>