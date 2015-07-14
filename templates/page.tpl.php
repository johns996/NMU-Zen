<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>

<div id="page">

  <header class="header" id="header" role="banner">
    <?php print render($page['top_navigation']); ?>
    <?php print render($page['branding']); ?>
    <?php print render($page['main_navigation']); ?>
  </header>

  <div id="main" class="container">
  	<div class="row">

			<?php
				// Render the sidebars to see if there's anything in them.
				$sidebar_first  = render($page['sidebar_first']);
				$sidebar_second = render($page['sidebar_second']);

				if ($sidebar_first){
					print '<aside class="sidebar-first">';
						print '<div class="col-md-2">'.$sidebar_first.'</div>';
					print '</aside>';
					$content_class = 'col-md-10';
				}
				elseif(!$sidebar_first && $sidebar_second){
					$content_class = 'col-sm-9';
				}
				elseif(!$sidebar_first && drupal_is_front_page())
-					$content_class = 'col-md-12-nmu';  //not used in styles but needed for the main NMU homepage since the video exists outside the grid
				else {
					$content_class = 'col-md-12';
				}
			?>

			<div id="content" class="column <?php print $content_class ?>" role="main">
				<?php //print render($page['highlighted']); ?>
				<?php //print $breadcrumb; ?>
				<a id="main-content"></a>
				<?php print render($page['breadcrumbs']); ?>
				<?php print render($title_prefix); ?>
				<?php if ($title): ?>
					<h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
				<?php endif; ?>
				<?php print render($title_suffix); ?>
				<?php print $messages; ?>
				<?php print render($tabs); ?>
				<?php //print render($page['help']); ?>
				<?php if ($action_links): ?>
					<ul class="action-links"><?php print render($action_links); ?></ul>
				<?php endif; ?>
				<?php
				if ($sidebar_first && $sidebar_second){
					print '<aside class="sidebar-second">';
						print $sidebar_second;
					print '</aside>';
				}
				?>
				<?php print render($page['content']); ?>
				<?php print $feed_icons; ?>
			</div>
		<?php
			if(!$sidebar_first && $sidebar_second){
				print '<aside class="sidebar-second">';
					print '<div class="col-sm-3">'.$sidebar_second.'</div>';
				print '</aside>';	
			}
		?>
		</div>
  </div>

  <?php print render($page['footer']); ?>

</div>

<?php print render($page['bottom']); ?>
