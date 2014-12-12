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
			?>

			<?php
				if ($sidebar_first && $sidebar_second){
					print '<aside class="sidebars">';
						print '<div class="col-md-3">'.$sidebar_first.'</div>';
						print '<div class="col-md-2">'.$sidebar_second.'</div>';
					print '</aside>';
				}
				elseif ($sidebar_first && !$sidebar_second){
					print '<aside class="sidebars">';
						print '<div class="col-md-2">'.$sidebar_first.'</div>';
					print '</aside>';
				}
				elseif (!$sidebar_first && $sidebar_second){
					print '<aside class="sidebars">';
						print '<div class="col-md-2">'.$sidebar_second.'</div>';
					print '</aside>';
				}
			?>

			<?php
				if ($sidebar_first && $sidebar_second)
					$sidebar_class = 'col-md-8';
				elseif ($sidebar_first && !$sidebar_second)
					$sidebar_class = 'col-md-10';
				elseif (!$sidebar_first && $sidebar_second)
					$sidebar_class = 'col-md-10';
				elseif(drupal_is_front_page())
					$sidebar_class = 'col-md-12-nmu';
				else  //no sidebars, not the front page
					$sidebar_class = 'col-md-12';
			?>

			<div id="content" class="column <?php print $sidebar_class ?>" role="main">
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
				<?php print render($page['content']); ?>
				<?php print $feed_icons; ?>
			</div>

		</div>
  </div>

  <?php print render($page['footer']); ?>

</div>

<?php print render($page['bottom']); ?>
