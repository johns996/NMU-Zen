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
  <footer id="footer" class="footer">
	  <div class="<?php print $classes; ?>">
		 <?php print $content; ?>
	  </div>
  </footer>
<?php endif; ?>
