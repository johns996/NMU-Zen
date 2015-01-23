<?php

$strSiteIdentifier = $GLOBALS['conf']['syslog_identity'];

echo '<div class="allcaps breadcrumbs">',
				'<script>breadcrumbBuilder(\''.$strSiteIdentifier.'\');</script>',
			'</div>';
?>