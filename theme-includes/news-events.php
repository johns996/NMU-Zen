<?php
//nmu-zen
?>

<div class="news-events-wrapper">
	<div class="news-events">
		<div class="events-header">
			<div class="events-label allcaps">News &<br /><span class="events-sub-label">Upcoming Events</span></div>
		</div>
		<div class="row events-section">
			<?php
				if(!$strHP) //make sure something was set in the block
					$strHP = "NMU Homepage";   //Pick this from the cms_events_categories table
				require_once('/htdocs/cmsphp/Admin/MiscInterfaces/HPEvents.php');
			?>
		</div>
	</div>
</div>