<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */


//tell zen to use my custom user-login and user-profile templates
function zen_nmu_theme() {
	$items = array();
	$items['user_login'] = array(
		'render element' => 'form',
		'template' => 'templates/user-login'
	);
	$items['user_profile'] = array(
		'render element' => 'form',
		'template' => 'templates/user-profile'
	);
	return $items;
}

//write the login form to be used for the 'boss mode' login
function zen_nmu_preprocess_user_login(&$variables) {
  $variables['login_link'] = t('saml_login');
  $variables['rendered'] = drupal_render_children($variables['form']);
}

/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function zen_nmu_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  zen_nmu_preprocess_html($variables, $hook);
  zen_nmu_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
function zen_nmu_preprocess_html(&$variables, $hook) {
  $variables['add_bootstrap'] = theme_get_setting('bootstrap');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));

  //pass field variables into the html template for display in the head
  $node = menu_get_object();
  if($node){
     $variables['thumbnail_image'] = $node->field_thumbnail_image['und'][0]['uri'];
     $variables['meta_description'] = $node->field_meta_description['und'][0]['value'];
  }

  //set site-specific stylesheets
	if(isset($GLOBALS['conf']['syslog_identity']))
	{
		// bulletin css
		if(strpos($GLOBALS['conf']['syslog_identity'], 'Bulletin') !== false)  //match any site with Bulletin in its identity
		{
			drupal_add_css(drupal_get_path('theme', 'zen_nmu') . '/css/fearless-bulletin.css'); //add a bulletin css to the start of the styles array
			$css = drupal_add_css();
			$styles = drupal_get_css($css);
		}
	}


}

//unset the generator meta tag
//https://www.drupal.org/node/982034
function zen_nmu_html_head_alter(&$head_elements) {
  unset($head_elements['system_meta_generator']);

  // Search the head elements for the Favicon and append a version
  foreach ($head_elements as $key => $element) {
    if (!empty($element['#attributes'])) {
      if (array_key_exists('href', $element['#attributes'])) {
        if (strpos($element['#attributes']['href'], 'favicon.ico') > 0) {
          $head_elements[$key]['#attributes']['href'] = base_path() .'favicon.ico?v=2';
        }
      }
    }
  }

}


/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
function zen_nmu_preprocess_page(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
function zen_nmu_preprocess_node(&$variables, $hook) {
	//add a css and js file to the fearless_nmu_homepage content type
	//this will appear above the main styles.css include so these styles can be overwritten
	if($variables['type'] == 'fearless_nmu_homepage'){
		drupal_add_css(drupal_get_path('theme', 'zen_nmu') . '/css/nmu-homepage.css');
		$css = drupal_add_css();
		$styles = drupal_get_css($css);
	}
	//add a css file to the fearless_admissions_home content type
	elseif($variables['type'] == 'fearless_admissions_home'){
		drupal_add_css(drupal_get_path('theme', 'zen_nmu') . '/css/nmu-admissions.css');
		$css = drupal_add_css();
		$styles = drupal_get_css($css);
	}
	//add a css file to the fearless_block_newsletter content type (acac newsletter)
	elseif($variables['type'] == 'fearless_block_newsletter'){
		drupal_add_css(drupal_get_path('theme', 'zen_nmu') . '/css/fearless-block-newsletter.css');
		$css = drupal_add_css();
		$styles = drupal_get_css($css);
	}
	//add a css and js file to the fearless_homepage content type
	elseif($variables['type'] == 'fearless_homepage' || $variables['type'] == 'fearless_homepage_info' || $variables['type'] == 'fearless_homepage_link'){
		drupal_add_css(drupal_get_path('theme', 'zen_nmu') . '/css/fearless-homepage.css');
		$css = drupal_add_css();
		$styles = drupal_get_css($css);
		//homepages need this JS library for the cycle to work
		drupal_add_js(drupal_get_path('theme', 'zen_nmu') . '/js/vendor/jquery.cycle2.min.js', array('type' => 'file', 'scope' => 'header'));
	}
	//add a css file to the fearless_northern_notes content type
	elseif($variables['type'] == 'fearless_northern_notes'){
		drupal_add_css(drupal_get_path('theme', 'zen_nmu') . '/css/fearless-northern-notes.css');
		$css = drupal_add_css();
		$styles = drupal_get_css($css);
	}
	//add a css file to the ALUMNI NEWSLETTER content type
	elseif($variables['type'] == 'programs_what_s_new_nmu'){
		drupal_add_css(drupal_get_path('theme', 'zen_nmu') . '/css/fearless-alumni-newsletter.css');
		$css = drupal_add_css();
		$styles = drupal_get_css($css);
	}
	//add a css file to the fearless_application content type
	elseif($variables['type'] == 'fearless_application'){
		drupal_add_css(drupal_get_path('theme', 'zen_nmu') . '/css/fearless-application.css');
		$css = drupal_add_css();
		$styles = drupal_get_css($css);
	}

}

function zen_nmu_preprocess_field(&$variables, $hook) {
	if ($variables['element']['#field_name'] == 'field_information_image') {
		$GLOBALS['info_images_present'] = true;
	}
}


/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function zen_nmu_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function zen_nmu_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function zen_nmu_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */
