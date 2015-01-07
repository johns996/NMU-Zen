<?php
//nmu-zen
?>

<div class="branding-one allcaps">Northern</div>
<div class="branding-two allcaps">Michigan University</div>

<?php
//alert-danger -> red
//alert-warning -> yellow
//alert-success -> green
//alert-info -> blue

$alertMessageFile = "/htdocs/Webb/DynamicallyCreatedFiles/NMU/emergency_alert_msg.shtml";

printR(filesize($alertMessageFile));

if(filesize($alertMessageFile) >  0){
	echo '
		<div class="alert alert-danger alert-dismissible alert-nmu" id="nmu-alert" role="alert">
		  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		  '.file_get_contents($alertMessageFile).'
		</div>
		';
}
?>