<?php
/**
 * @file
 * Returns the HTML for a single Drupal page while offline.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728174
 */
?><!DOCTYPE html>
<html <?php print $html_attributes; ?>>
<head>

<?php print $head; ?>
<title><?php print $head_title; ?></title>

<meta name="MobileOptimized" content="width">
<meta name="HandheldFriendly" content="true">
<meta name="viewport" content="width=device-width">
<meta http-equiv="cleartype" content="on">

<link rel="stylesheet" href="<?php print $base_path . $path_to_zen; ?>_nmu/css/bootstrap.min.css?v3.3.4">
<link rel="stylesheet" href="<?php print $base_path . $path_to_zen; ?>_nmu/css/bootstrap-theme.min.css?v3.3.4">

</head>

<body>
	<div class="well well-lg" style="width:60%; margin:10% auto; min-height:120px;">
		<img src="/sites/all/themes/zen_nmu/images/nmu_logo_black.png" style="float:left; margin-right:50px; margin-bottom:20px;"/>
		<?php print $messages; ?>
		<?php print $content; ?>
	</div>
</body>
</html>
