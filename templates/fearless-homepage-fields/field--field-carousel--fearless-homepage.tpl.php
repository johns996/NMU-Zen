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
		 data-cycle-overlay-template="<div class='button'>Cycle Through News</div>
			<div class='cycle-nav'>
				<div class='cycle-prev'>&#10142;</div>
				<div class='cycle-next'>&#10142;</div>
			</div>"
		 data-cycle-log="false">
		<div class="cycle-overlay"></div>
	<?php
		foreach ($items as $delta => $item) {
			$strURL = file_create_url($item['#item']['uri']);
			echo '<img src="'.$strURL.'"',
						'data-cycle-caption="<div class=\'button\'>'.$item['#item']['title'].'</div>',
						'<p>'.str_replace('"','\'',$item['#item']['alt']).'</p>"',
						'alt=\''.str_replace('\'','&quo;',$item['#item']['alt']).'\'/>';
		}
	?>
</section>

<?php
/* //sample of what the cycle entires will look like if done by hand
		<img 	src="/responsivenmu/sites/DrupalResponsiveNMU/files/UserFiles/internal-homepage/slideshow-not-green.jpg"
					data-cycle-caption="<div class='button'>What's new in the department?</div>
					<p>NMU music graduates have a 100 percent placement rate due to the national shortage of certified music teachers. Our graduates not only work as educators, but also as band directors, professional musicians, voice-over actors, jingle writers, composers, music marketers and in many other careers.</p>"
					alt='The NMU "Pride of the North" Marching Band'/>
		<img 	src="/responsivenmu/sites/DrupalResponsiveNMU/files/UserFiles/internal-homepage/slideshow-not-green.jpg"
					data-cycle-caption="<p>Bulbasaur Ivysaur Venusaur Charmander Charmeleon Charizard Squirtle Wartortle Blastoise Caterpie Metapod Butterfree Weedle Kakuna Beedrill Pidgey Pidgeotto Pidgeot Rattata Raticate Spearow Fearow Ekans Arbok Pikachu Raichu Sandshrew Sandslash Nidoran Nidorina Nidoqueen Nidoran Nidorino Nidoking Clefairy Clefable Vulpix Ninetales.</p>"
					alt='The NMU "Pride of the North" Marching Band'/>
*/
?>