<?php
//nmu-zen

//alert-danger -> red
//alert-warning -> yellow
//alert-success -> green
//alert-info -> blue
?>

<div class="branding-one allcaps">Northern</div>
<div class="branding-two allcaps">Michigan University</div>

<?php
//if($_SERVER['REMOTE_ADDR'] == '204.38.63.71'){
	if($_SERVER['REQUEST_URI'] == '/'){
			echo '
			<div class="alert alert-info alert-dismissible alert-nmu" id="nmu-alert" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				With regret, we inform you of the passing of Dr. Paul Lang, Provost and Vice President of Academic Affairs. <a href="/communicationsandmarketing/news-releases?articleID=172886&">Read more</a>
			</div>
			';
	}
//}


$alertMessageFile = "/htdocs/Webb/DynamicallyCreatedFiles/NMU/emergency_alert_msg.shtml";

if(filesize($alertMessageFile) >  0){
	echo '
		<div class="alert alert-danger alert-dismissible alert-nmu" id="nmu-alert" role="alert">
		  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		  '.file_get_contents($alertMessageFile).'
		</div>
		';
}
?>