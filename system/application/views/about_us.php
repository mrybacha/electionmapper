<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="election maps, election mapping, election results, federal election, realtime, google maps, election canada" /> 
<meta name="description" content="Mapping Canadian federal election results in real-time on a polling division level." />
<title>About</title>
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
				<li><a href="/election/intro/2008/10001"><span>Riding Intro</span></a></li>
                <li><a href="/election/results/2008/10001"><span>Results</span></a></li>
				<li><a href="/election/map/2008/10001"><span>Map of Results</span></a></li>
				<li><a href="/maps/"><span>Electoral Maps</span></a></li>
				<li class="selected"><a href="/election/about"><span>About</span></a></li>
			</ul>
		</div>

		<div id="header" class="clear">
			<h2>About</h2>
		</div>
		<div id="body" class="clear">
			<div id="content">
              
				<h3>About this website</h3>
				<p>This website started out as a major <a href="http://www.cs.sfu.ca/cc/470/ggbaker/project/">group project</a> for a fourth year <a href="http://www.cs.sfu.ca/cc/470/ggbaker/">Web-Based Information Systems</a> course at Simon Fraser University. We had to plan and implement a web information system using modern web standards, open-source software, and an MVC framework. The course required a proposal be sent and approved by the instructor, a checkpoint for implementation to make sure the project was underway, and a poster presentation to the university community to show what the system was supposed do and why it would be useful.</p> 
				<p>When I started to think of concepts for the project, I knew that I wanted to do something with Google Maps in real time. I think that having real time data available to anyone on Earth (as long as they can get "plugged in") is the true cornerstone of the usefulness of the Internet. Mapping, cartography and geography have been a bit of an interest of mine since middle school, and I have been interested and involved in Canadian federal politics since about grade 11. So if you combine these elements together, you can see why I decided to create a system capable of providing real time election results, including the real time mapping of those results, and charting for added measure. A quick look through Google didn't yield any useful results, so the plan was set.</p>
				<p>The official storyline behind the project was that it could be something that Elections Canada, or ultimately any electoral authority for that matter, could adopt and use for relaying live information to the public immediately following the closing of polling stations. People would be able to see in real time how their candidate is doing, and see how their neighbours voted. Candidates would be able to see right away how their best and worst areas fared. Plus, who doesn't like colourful charts and maps? Lastly, if you wait for the media to report on your electoral district, you might be waiting a while, especially if you don't have a minister or "star candidate" running for office, or if your interested area is not local to where you happen to be on election night. To alleviate this, email alerts would be available to anyone who wanted to know what the results are when their polling division is tabulated, when the last division has been tabulated, or when a candidate is declared by the system as the winner.</p>
				<p>I've since decided to take this on as a pet project to expand my skills, and to create a more useful and sophisticated array of information (including historical information) available to the public. I know websites specialize in different things, such as political news, public polling, and numbers and statistics. This website will specialize in mapping, and I'm going to stay away from that other stuff because frankly there's not much point to replicate what is already available, and I don't have that much time on my hands. I hope people will find this website useful, or at the very least, interesting to look at. If you find any mistakes, please <a href="mailto:mike@electionmapper.ca">let me know</a>. During an election or byelection, if any campaigns are interested in using the live service in conjunction with their scrutineers, I could set you up.</p>
				<h3>How this works</h3>
				<p>The concept is quite simple, however when I started, I never had a <em>real</em> website, I didn't know what a MVC framework was, I didn't know PHP, I never used Linux, and I never made a database online before. I had to learn all this and finish the project within 2 months. As this website continues to be a learning resource for me, and in case anyone else also wants to learn about how I set this up or where my information is from, each resource is listed and readily accessible at the bottom of each page. Here is how the service breaks down:</p>
				<h4>Web host and domain name registrar</h4>
				<p>The host I am using is <a href="http://www.davesnetwork.ca/">Dave's Network</a>. Dave is a University of Ontario Information Technology student, who does a bunch of computer things on the side. He started his hosting service in April 2009 and offers free webhosting via <a href="http://forums.redflagdeals.com/free-web-hosting-daves-network-765035/">redflagdeals.com</a>. I took advantage of this offer and I must say that the control panel for the various website controls and settings is a lot better than what I've seen from paid hosts, and at no cost you can run most websites. I've since upgraded to a paid account. The .ca and .com domain names were bought via <a href="http://www.netfirms.ca/">Netfirms</a>, as they have the cheapest registration and renewal rates I can find. There is a coupon for a discount on .com domains available on Google. Don't get suckered into GoDaddy's cheap rates because you'll be paying it back in subsequent years.</p>
				<h4>Server details and MVC framework</h4>
				<p>The host server I am using as of the time of writing has (for the nerds) <a href="http://www.apache.org/">Apache</a> 2.2.16, PHP 5.2.14, MySQL 5.0.91, phpMyAdmin 3.3.8, architecture x86_64, <a href="http://www.redhat.com/rhel/">Red Hat Enterprise Linux Server 5 OS</a>, and kernel version 2.6.18-194.11.3.el5. The MVC framework I'm using is <a href="http://codeigniter.com/">CodeIgniter</a> 1.7.3. Installation takes 30 seconds and is literally download, unzip, copy, and paste into your website folder. The online tutorials and user guide are excellent in learning the ropes on how it works. For PHP, you can Google for any solution you need, and most of the time you'll find that you end up on <a href="http://www.php.net/">PHP's website</a>, which also has great examples. <a href="http://www.phpmyadmin.net">phpMyAdmin</a> does all the administrative work you need on your <a href="http://www.mysql.com/">MySQL</a> database(s), and is a good tool overall. If you want to make your own server, everything above is available for free except that particular version of Linux, but <a href="http://releases.ubuntu.com/">Ubuntu</a> works just as fine. The website design is based on "ablaze" by <a href="http://www.spyka.net/web-templates/ablaze/">Spyka Webmaster</a>, with some modifications. It is coded in XHTML 1.0 Strict through <a href="http://notepad-plus-plus.org/">Notepad++</a>.</p>
				<h4>Data</h4>
				<p>All electoral data is provided by <a href="http://www.elections.ca">Elections Canada</a>, while map data is provided by <a href="http://geogratis.cgdi.gc.ca/geogratis/en/download/electoral.html">Natural Resources Canada</a>. The data is shown visually with the help of <a href="http://code.google.com/apis/maps/documentation/javascript/">Google Maps JavaScript API V3</a> and <a href="http://code.google.com/apis/chart/">Google Charts API</a>. The charts load on demand depending on what data is passed through the image URL, while Google Maps allows us to overlay KML data layers to show our data. Within the maps application itself, you can view the street map, satellite imagery, or the terrain. If that's not enough, you can virtually transplant yourself into a neighbourhood using Street View. Google Earth was also available, but since users are required to install a plugin and it shows pretty much the same thing as Google Maps, I've left it out.</p>
			</div>
		</div>
	</div>
    <?php $this->load->view('footer_view'); ?>