<?php
/**
 * @file
 * Returns HTML for the top navigation region.
 * This was added to insert the clearfix into this region.
 * Otherwise it is identical to the region template in the zen theme.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728112
 */
?>
<?php if ($content): ?>
  <div class="clearfix <?php print $classes; ?>">
    <?php print $content; ?>
  </div>
<?php endif; ?>
