<?php
/**
 * Implements hook_form_system_theme_settings_alter().
 *
 * @param $form
 *   Nested array of form elements that comprise the form.
 * @param $form_state
 *   A keyed array containing the current state of the form.
 */
function zen_nmu_form_system_theme_settings_alter(&$form, &$form_state, $form_id = NULL)  {
  // Work-around for a core bug affecting admin themes. See issue #943212.
  if (isset($form_id)) {
    return;
  }

  // Create the form using Forms API: http://api.drupal.org/api/7

  $form['zen_nmu_framework_addins'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('NMU Framework Addins'),
  );
  $form['zen_nmu_framework_addins']['bootstrap'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Enable Bootstrap'),
    '#default_value' => theme_get_setting('bootstrap'),
    '#description'   => t("This option enables the bootstrap framework."),
  );
  $form['zen_nmu_framework_addins']['fontawesome'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Enable FontAwesome'),
    '#default_value' => theme_get_setting('fontawesome'),
    '#description'   => t("This option enables the Font Awesome web font via the MaxCDN."),
  );


  // Remove some of the base theme's settings.
  /* -- Delete this line if you want to turn off this setting.
  unset($form['themedev']['zen_wireframes']); // We don't need to toggle wireframes on this site.
  // */

  // We are editing the $form in place, so we don't need to return anything.
}
