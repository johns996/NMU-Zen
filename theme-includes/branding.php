<?php
//nmu-zen

/*
## alert colors
		alert-danger -> red
		alert-warning -> yellow
		alert-success -> green
		alert-info -> blue
*/
?>

<div class="branding-logo">
	<img src="/Webb/Images/NMULogos/NMU_G_Horizontal_Transparent.png" style="width:500px; height:68px;" alt="NMU Logo" title="Northern Michigan University">
</div>

<?php

/*
//non-emergency alert section
if($_SERVER['REMOTE_ADDR'] == '198.110.203.107'){
	if($_SERVER['REQUEST_URI'] == '/'){
			echo '<div class="alert alert-info alert-dismissible alert-nmu" id="nmu-alert" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				NMU spring commencement will take place at 10:30 a.m. on Saturday, May 2.<br>
				For information about the ceremony, speakers, broadcast and more, visit the <a href="/commencement">commencement website</a>.
			</div>';
	}
}
*/

$alertMessageFile = "/htdocs/Webb/DynamicallyCreatedFiles/NMU/emergency_alert_msg.shtml";

if(filesize($alertMessageFile) >  0){
	echo '<div class="alert alert-danger alert-dismissible alert-nmu" id="nmu-alert" role="alert">
		  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		  '.file_get_contents($alertMessageFile).'
		</div>';
}

?>
