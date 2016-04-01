<?php
/**
 * @file
 * Returns the HTML for the footer region.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728140
 */
?>
<?php if ($content): ?>
  <footer id="footer" class="<?php print $classes; ?>">
    <?php print $content; ?>
  </footer>
<?php endif; ?>

<?php


# require_once "/htdocs/cmsphp/Admin/Includes/FunctionsCommon.php";
# PrintR($GLOBALS['conf']['syslog_identity']);
if($GLOBALS['conf']['syslog_identity'] == "DrupalArtAndDesign" || $GLOBALS['conf']['syslog_identity'] == "DrupalBusiness")
	require_once "/htdocs/cmsphp/Admin/MiscInterfaces/Tracker.php";


?>
