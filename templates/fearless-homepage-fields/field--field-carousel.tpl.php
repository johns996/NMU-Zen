<?php

/**
 * @file field.tpl.php
 * Default template implementation to display the value of a field.
 *
 * This file is not used and is here as a starting point for customization only.
 * @see theme_field()
 *
 * Available variables:
 * - $items: An array of field values. Use render() to output them.
 * - $label: The item label.
 * - $label_hidden: Whether the label display is set to 'hidden'.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - field: The current template type, i.e., "theming hook".
 *   - field-name-[field_name]: The current field name. For example, if the
 *     field name is "field_description" it would result in
 *     "field-name-field-description".
 *   - field-type-[field_type]: The current field type. For example, if the
 *     field type is "text" it would result in "field-type-text".
 *   - field-label-[label_display]: The current label position. For example, if
 *     the label position is "above" it would result in "field-label-above".
 *
 * Other variables:
 * - $element['#object']: The entity to which the field is attached.
 * - $element['#view_mode']: View mode, e.g. 'full', 'teaser'...
 * - $element['#field_name']: The field name.
 * - $element['#field_type']: The field type.
 * - $element['#field_language']: The field language.
 * - $element['#field_translatable']: Whether the field is translatable or not.
 * - $element['#label_display']: Position of label display, inline, above, or
 *   hidden.
 * - $field_name_css: The css-compatible field name.
 * - $field_type_css: The css-compatible field type.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess_field()
 * @see theme_field()
 *
 * @ingroup themeable
 */
?>

<section class="slideshow-section row">
	<div class="cycle-caption col-md-6"></div>
		<div id="cycle-slideshow" class="cycle-slideshow col-md-6"
		 data-cycle-fx="scrollHorz"
		 data-cycle-swipe="true"
		 data-cycle-swipe-fx="scrollHorz"
		 data-cycle-timeout="0"
		 data-cycle-caption=".cycle-caption"
		 data-cycle-caption-template="{{cycleCaption}}"
		 data-cycle-overlay-template="{{cycleOverlay}}"
		 data-cycle-log="false">
		<div class="cycle-overlay"></div>
	<?php

		foreach ($items as $delta => $item) {
			$strURL = file_create_url($item['#item']['uri']);
			$itemAlt = htmlspecialchars($item['#item']['alt']);
			$itemTitle = htmlspecialchars($item['#item']['title']);

			$numberOfItems = count($items);
			if($delta+1 >= $numberOfItems)
				$itemTitleNext = htmlspecialchars($items[0]['#item']['title']);
			else
			 $itemTitleNext = htmlspecialchars($items[$delta+1]['#item']['title']);

			if($numberOfItems > 1)
				$itemOverlay = '<div class=\'cycle-overlay\'><div class=\'button\' id=\'custom_pager\'>Cycle To: '.$itemTitleNext.'</div><div class=\'cycle-nav\'><div class=\'cycle-prev\'>&#10142;</div><div class=\'cycle-next\'>&#10142;</div></div></div>';
			else
				$itemOverlay = '';

			echo '<img src="'.$strURL.'" ',
						'data-cycle-overlay="'.$itemOverlay.'" ',
						'data-cycle-caption="<div class=\'button\'>'.$itemTitle.'</div> ',
						'<p>'.$itemAlt.'</p>" ',
						'alt=\''.$itemAlt.'\'/>';
		}
	?>

</section>