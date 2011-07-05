     <?php if (!isset($year)) $year="2008";
	 $PDDB = $this->load->database($year, TRUE);
	 if (!isset($ridingrow))
	 {
		$noriding = $PDDB->query("SELECT * FROM ridings WHERE provshort='NL' ORDER BY edname ASC");
		$ridingrow = $noriding->row();
	 }
	 $BC = $PDDB->query("SELECT * FROM ridings WHERE provshort='BC' ORDER BY edname ASC");
	 $AB = $PDDB->query("SELECT * FROM ridings WHERE provshort='AB' ORDER BY edname ASC");
	 $SK = $PDDB->query("SELECT * FROM ridings WHERE provshort='SK' ORDER BY edname ASC");
	 $MB = $PDDB->query("SELECT * FROM ridings WHERE provshort='MB' ORDER BY edname ASC");
	 $ON = $PDDB->query("SELECT * FROM ridings WHERE provshort='ON' ORDER BY edname ASC");
	 $QC = $PDDB->query("SELECT * FROM ridings WHERE provshort='QC' ORDER BY edname ASC");
	 $NB = $PDDB->query("SELECT * FROM ridings WHERE provshort='NB' ORDER BY edname ASC");
	 $NS = $PDDB->query("SELECT * FROM ridings WHERE provshort='NS' ORDER BY edname ASC");
	 $PE = $PDDB->query("SELECT * FROM ridings WHERE provshort='PE' ORDER BY edname ASC");
	 $NL = $PDDB->query("SELECT * FROM ridings WHERE provshort='NL' ORDER BY edname ASC");
	 $YK = $PDDB->query("SELECT * FROM ridings WHERE provshort='YK' ORDER BY edname ASC");
	 $NT = $PDDB->query("SELECT * FROM ridings WHERE provshort='NT' ORDER BY edname ASC");
	 $NU = $PDDB->query("SELECT * FROM ridings WHERE provshort='NU' ORDER BY edname ASC");
	 ?>
	 <div id="footer">
          <div class="footer-content">

            <div class="footer-box">
                <h4>Legal</h4>
                <p>
                    The information contained on this website is wholly unofficial, distributed and transmited on an "as is" and "as available" basis, without warranties of any kind, either express or implied, and should not be used as an authoritative source of results of an election event. In the event of a discrepancy between the results posted on this site and the official results from <a href="http://www.elections.ca">Elections Canada</a>, the latter shall prevail. 
                </p>
            </div>
            
            <div class="footer-box">
                <h4>Navigation</h4>
                <ul>
                  <li><a href="/">Home</a></li>
				  <li><a href="/election/intro/<?php echo $year."/".$ridingrow->fednum;?>">Riding Intro</a></li>
                  <li><a href="/election/results/<?php echo $year."/".$ridingrow->fednum;?>">Results</a></li>
                  <li><a href="/election/map/<?php echo $year."/".$ridingrow->fednum;?>">Map of Results</a></li>
				  <li><a href="/maps/">Electoral Maps</a></li>
                  <li><a href="/election/about">About</a></li>
                </ul>
            </div>
            
            <div class="footer-box">
    
                <h4>Resources</h4>
                <ul>
                    <li><a href="http://www.elections.ca/content.aspx?section=ele&dir=pas&document=index&lang=e">Past Election Results</a></li>
                    <li><a href="http://www.elections.ca/content.aspx?section=res&dir=cir/list&document=index&lang=e">Federal Electoral Districts</a></li>
                    <li><a href="http://www.elections.ca/content.aspx?section=res&dir=cir/maps&document=index&lang=e">Riding Maps</a></li>
                    <li><a href="http://geogratis.cgdi.gc.ca/geogratis/en/download/electoral.html">Electoral Boundary Shapefiles</a></li>
                    <li><a href="http://code.google.com/apis/maps/documentation/javascript/">Google Maps API</a></li>
					<li><a href="http://code.google.com/apis/chart/">Google Charts API</a></li>
					<li><a href="http://codeigniter.com/">Built with CodeIgniter MVC</a></li>
					<li><a href="http://www.davesnetwork.ca/">Hosted by Dave's Network</a></li>
                </ul>	
            </div>
            
            <div class="footer-box end-footer-box">
                <h4>Choose a new riding</h4>                
				<select onchange="window.location=this.options[this.selectedIndex].value;">
					<option value="">-- BC --</option>
					<optgroup label="British Columbia">
					<?php foreach ($BC->result_array() as $BCrow) echo "<option value=\"/election/intro/".$year."/".$BCrow['fednum']."\">".$BCrow['edname']."</option>\n					";?>
					</optgroup>
				</select>
				<br /><br />
				<select onchange="window.location=this.options[this.selectedIndex].value;">
					<option value="">-- AB --</option>
					<optgroup label="Alberta">
					<?php foreach ($AB->result_array() as $ABrow) echo "<option value=\"/election/intro/".$year."/".$ABrow['fednum']."\">".$ABrow['edname']."</option>\n					";?>
					</optgroup>
				</select>
				<br /><br />
				<select onchange="window.location=this.options[this.selectedIndex].value;">
					<option value="">-- SK/MB --</option>
					<optgroup label="Saskatchewan">
					<?php foreach ($SK->result_array() as $SKrow) echo "<option value=\"/election/intro/".$year."/".$SKrow['fednum']."\">".$SKrow['edname']."</option>\n					";?>
					</optgroup>
					<optgroup label="Manitoba">
					<?php foreach ($MB->result_array() as $MBrow) echo "<option value=\"/election/intro/".$year."/".$MBrow['fednum']."\">".$MBrow['edname']."</option>\n					";?>
					</optgroup>
				</select>
				<br /><br />
				<select onchange="window.location=this.options[this.selectedIndex].value;">
					<option value="">-- ON --</option>
					<optgroup label="Ontario">
					<?php foreach ($ON->result_array() as $ONrow) echo "<option value=\"/election/intro/".$year."/".$ONrow['fednum']."\">".$ONrow['edname']."</option>\n					";?>
					</optgroup>
				</select>
				<br /><br />
				<select onchange="window.location=this.options[this.selectedIndex].value;">
					<option value="">-- QC --</option>
					<optgroup label="Qu&eacute;bec">
					<?php foreach ($QC->result_array() as $QCrow) echo "<option value=\"/election/intro/".$year."/".$QCrow['fednum']."\">".$QCrow['edname']."</option>\n					";?>
					</optgroup>
				</select>
				<br /><br />
				<select onchange="window.location=this.options[this.selectedIndex].value;">
					<option value="">-- NB/NS/PE/NL --</option>
					<optgroup label="New Brunswick">
					<?php foreach ($NB->result_array() as $NBrow) echo "<option value=\"/election/intro/".$year."/".$NBrow['fednum']."\">".$NBrow['edname']."</option>\n					";?>
					</optgroup>
					<optgroup label="Nova Scotia">
					<?php foreach ($NS->result_array() as $NSrow) echo "<option value=\"/election/intro/".$year."/".$NSrow['fednum']."\">".$NSrow['edname']."</option>\n					";?>
					</optgroup>
					<optgroup label="Prince Edward Island">
					<?php foreach ($PE->result_array() as $PErow) echo "<option value=\"/election/intro/".$year."/".$PErow['fednum']."\">".$PErow['edname']."</option>\n					";?>
					</optgroup>
					<optgroup label="Newfoundland and Labrador">
					<?php foreach ($NL->result_array() as $NLrow) echo "<option value=\"/election/intro/".$year."/".$NLrow['fednum']."\">".$NLrow['edname']."</option>\n					";?>
					</optgroup>
				</select>
				<br /><br />
				<select onchange="window.location=this.options[this.selectedIndex].value;">
					<option value="#">-- YK/NT/NU --</option>
					<optgroup label="Yukon">
					<?php foreach ($YK->result_array() as $YKrow) echo "<option value=\"/election/intro/".$year."/".$YKrow['fednum']."\">".$YKrow['edname']."</option>\n					";?>
					</optgroup>
					<optgroup label="Northwest Territories">
					<?php foreach ($NT->result_array() as $NTrow) echo "<option value=\"/election/intro/".$year."/".$NTrow['fednum']."\">".$NTrow['edname']."</option>\n					";?>
					</optgroup>
					<optgroup label="Nunavut">
					<?php foreach ($NU->result_array() as $NUrow) echo "<option value=\"/election/intro/".$year."/".$NUrow['fednum']."\">".$NUrow['edname']."</option>\n					";?>
					</optgroup>
				</select>
            </div>     
            <div class="clear"></div> 
        </div>
        <div id="footer-links">
                <p>Copyright &copy; <?php echo safe_mailto('mike@electionmapper.ca', 'Michael Rybacha');?> 2011.</p>
        </div>  
    </div>
</body>
</html>