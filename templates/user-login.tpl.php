<?php
require_once "/htdocs/cmsphp/Admin/Includes/FunctionsCommon.php";

$strBaseURL = $GLOBALS['base_url'];
$strURL = $strBaseURL.'/saml_login';

//this file is included for all other theme login pages
?>
<style>
#drupal_tabs{display:none;}
</style>
<h2>NMU Content Management System</h2>
<p>Welcome to the NMU Content Management System (CMS).  Access to websites stored within the CMS is limited to authorized users.
Before access to any site is granted, a CMS training session must be completed first.  To request a training session and
access to a site, please contact <a href="mailto:ericjohn@nmu.edu">Eric Johnson</a>.</p>

<div style="background-color:#fccccc; margin:20px; padding:10px; border:1px dotted red; max-width:80%;">
<h3>State Information Lost Error</h3>
<p>Many Users have been reporting an error with the CMS log in process.  After entering their username and password an error screen with the message <em>State Information Lost</em> appears.  This error is specific to Internet Explorer 9 and how it handles SSL.  <strong>The only fix for the error at this point is using a different version of Internet Explorer (10 or 11) or using Firefox or Chrome</strong>.</p>
</div>

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
