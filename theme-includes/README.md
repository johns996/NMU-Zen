##Theme Includes##

Because NMU is a massive multi-site theme include files are used to easily duplicate blocks across the site.  This allows a small piece of code to be repeated many times by simply creating blocks with a php include referencing the files stored here.

This also allows any deviation from the normal file format to be easily made and stored in a single location.

Files are stored within the theme directory for easy tracking though git.

###Include Syntax###
	<?php
	require_once "/htdocs/Drupal/sites/all/themes/zen_nmu/theme-includes/footer-main.php";
	?>
