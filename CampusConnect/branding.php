<?php
//nmu-zen

//alert-danger -> red
//alert-warning -> yellow
//alert-success -> green
//alert-info -> blue
?>


<?php

$strBasicMessages = "/htdocs/Webb/DynamicallyCreatedFiles/NMU/none_emergency_msg.shtml";

if(filesize($strBasicMessages) >  0)
	echo file_get_contents($strBasicMessages);

	# <div class="alert alert-info alert-dismissible alert-nmu" id="nmu-alert" role="alert">
	#	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	#	NMU spring commencement will take place at 10:30 a.m. on Saturday, May 2.<br>
	#	For information about the ceremony, speakers, broadcast and more, visit the <a href="/commencement">commencement website</a>.
	# </div>



$strAlertMessageFile = "/htdocs/Webb/DynamicallyCreatedFiles/NMU/emergency_alert_msg.shtml";

if(filesize($strAlertMessageFile) >  0)
{
	echo '
		<div class="alert alert-danger alert-dismissible alert-nmu" id="nmu-alert" role="alert">
		  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		  '.file_get_contents($strAlertMessageFile).'
		</div>
		';
}
?>
