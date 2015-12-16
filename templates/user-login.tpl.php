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


		<style>
		.alert {
			padding: 15px;
			margin: 0 20px 20px 20px;
			border: 1px solid transparent;
			border-radius: 4px;
		}
		.alert-warning {
			color: #8a6d3b;
			background-color: #fcf8e3;
			border-color: #faebcc;
		}
		.alert {
			text-shadow: 0 1px 0 rgba(255,255,255,.2);
			-webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,.25),0 1px 2px rgba(0,0,0,.05);
			box-shadow: inset 0 1px 0 rgba(255,255,255,.25),0 1px 2px rgba(0,0,0,.05);
		}
		.alert-warning {
			background-image: -webkit-linear-gradient(top,#fcf8e3 0,#f8efc0 100%);
			background-image: -o-linear-gradient(top,#fcf8e3 0,#f8efc0 100%);
			background-image: -webkit-gradient(linear,left top,left bottom,from(#fcf8e3),to(#f8efc0));
			background-image: linear-gradient(to bottom,#fcf8e3 0,#f8efc0 100%);
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fffcf8e3', endColorstr='#fff8efc0', GradientType=0);
			background-repeat: repeat-x;
			border-color: #f5e79e;
		}
		</style>

		<!--[if IE 9]>
		<div class="alert alert-warning" role="alert">
		<h3>Incompatible Browser</h3>
		<p>The browser you are using, Internet Explorer 9, is known to cause some issues with the NMU CMS and the log in process.  It is strongly recommended that you use a different version of Internet Explorer (10 or 11) or use Firefox or Chrome.</p>
		</div><![endif]-->

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
