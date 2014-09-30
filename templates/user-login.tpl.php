<?php
require_once "/htdocs/cmsphp/Admin/Includes/FunctionsCommon.php";

$strBaseURL = $GLOBALS['base_url'];
$strURL = $strBaseURL.'/saml_login';
?>
<style>
#drupal_tabs{display:none;}
</style>
<h2>NMU Content Management System</h2>
<p>Welcome to the NMU Content Management System (CMS).  Access to websites stored within the CMS is limited to authorized users.
Before access to any site is granted, a CMS training session must be completed first.  To request a training session and
access to a site, please contact <a href="mailto:ericjohn@nmu.edu">Eric Johnson</a>.</p>
<div id="cms_login">
	<strong>Authorized Users:</strong><br />
	<a href="<?php print $strURL; ?>">Click here to log into the NMU CMS</a>
</div>

<?php
if(CORE_Debug() || $_SERVER['HTTP_HOST'] !== 'www.nmu.edu')
{
	echo '<br /><div class="boss_login">';
	print $rendered;
	echo '</div>';
}
?>
