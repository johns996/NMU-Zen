<?php
/**
 * @file
 * Returns the HTML for the basic html structure of a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728208
 */
?><!DOCTYPE html>
<!--[if IEMobile 7]><html class="iem7" <?php print $html_attributes; ?>><![endif]-->
<!--[if lte IE 6]><html class="lt-ie9 lt-ie8 lt-ie7" <?php print $html_attributes; ?>><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="lt-ie9 lt-ie8" <?php print $html_attributes; ?>><![endif]-->
<!--[if IE 8]><html class="lt-ie9" <?php print $html_attributes; ?>><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!--><html <?php print $html_attributes . $rdf_namespaces; ?>><!--<![endif]-->

<head>

<?php print $head; ?>

<title><?php print $head_title; ?></title>
<meta property="og:title" content="<?php print $head_title_array['title']; ?>">
<meta property="og:site_name" content="<?php print $head_title_array['name']; ?>">
<?php
	$base = $GLOBALS['base_url'].'/';
	$path = current_path();
	$alias = drupal_lookup_path('alias',$path);
	if($alias){
		$url = $base.$alias;
	} else {
		$url = $base.$path;
	}
?>
<meta property="og:url" content="<?php print $url; ?>">
<?php if ($thumbnail_image): ?>
<?php $result = image_get_info($thumbnail_image); ?>
<!--
  <PageMap>
    <DataObject type="thumbnail">
      <Attribute name="src" value="<?php print file_create_url($thumbnail_image); ?>"/>
      <Attribute name="width" value="<?php print $result['width']; ?>"/>
      <Attribute name="height" value="<?php print $result['height']; ?>"/>
    </DataObject>
  </PageMap>
-->
<meta property="og:image" content="<?php print file_create_url($thumbnail_image); ?>">
<?php endif; ?>
<?php if ($meta_description): ?>
<meta property="og:description" content="<?php print $meta_description; ?>">
<meta name="description" content="<?php print $meta_description; ?>">
<?php endif; ?>

<?php if ($default_mobile_metatags): ?>
<meta name="MobileOptimized" content="width">
<meta name="HandheldFriendly" content="true">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php endif; ?>
<meta http-equiv="cleartype" content="on">
<link rel="search" type="application/opensearchdescription+xml" title="Northern Michigan University" href="/opensearch.xml" />

<?php print $styles; ?>

<?php print $scripts; ?>

<?php if ($add_html5_shim and !$add_respond_js): ?>
<!--[if lt IE 9]>
<script src="<?php print $base_path . $path_to_zen; ?>/js/html5.js?v1.0"></script>
<![endif]-->
<?php elseif ($add_html5_shim and $add_respond_js): ?>
<!--[if lt IE 9]>
<script src="<?php print $base_path . $path_to_zen; ?>/js/html5-respond.js?v1.0"></script>
<![endif]-->
<?php elseif ($add_respond_js): ?>
<!--[if lt IE 9]>
<script src="<?php print $base_path . $path_to_zen; ?>/js/respond.js?v1.0"></script>
<![endif]-->
<?php endif; ?>

<?php if ($add_bootstrap): ?>
<link rel="stylesheet" href="<?php print $base_path . $path_to_zen; ?>_nmu/css/bootstrap.min.css?v3.3.4">
<link rel="stylesheet" href="<?php print $base_path . $path_to_zen; ?>_nmu/css/bootstrap-theme.min.css?v3.3.4">
<script src="<?php print $base_path . $path_to_zen; ?>_nmu/js/vendor/bootstrap.min.js?v3.3.4"></script>
<?php endif; ?>

</head>

<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <?php if ($skip_link_text && $skip_link_anchor): ?>
    <p id="skip-link">
      <a href="#<?php print $skip_link_anchor; ?>" class="element-invisible element-focusable"><?php print $skip_link_text; ?></a>
    </p>
  <?php endif; ?>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>
