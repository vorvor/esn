<?php

/**
 * @file
 * Publishing options form for the node. This contains the panelizer
 * override selector.
 */

/**
 * Plugins are described by creating a $plugin array which will be used
 * by the system that includes this file.
 */
$plugin = array(
  'single' => TRUE,
  'title' => t('Node form workbench moderation options'),
  'icon' => 'icon_node_form.png',
  'description' => t('Workbench moderation options on the Node form.'),
  'required context' => new ctools_context_required(t('Form'), 'node_form'),
  'category' => t('Node Form Panes'),
  'edit form' => 'node_form_panes_node_form_content_type_edit_form',
  'render callback' => 'node_form_panes_node_form_workbench_moderation_content_type_render',
  'admin title' => 'node_form_panes_node_form_workbench_moderation_content_type_admin_title',
);

function node_form_panes_node_form_workbench_moderation_content_type_render($subtype, $conf, $panel_args, &$context) {
  $block = new stdClass();

  $block->module = t('node_form');
  $block->delta = 'workbench-moderation-options';

  if (isset($context->form)) {
    if (isset($context->form['options']['workbench_moderation_state_new'])) {

      // Workbench is usually just in amongst the publishing options
      $block->content['workbench_moderation'] = array(
        '#type' => 'fieldset',
        '#title' => t('Moderation'),
        '#attributes' => array('class' => array()),
      );
      $block->content['workbench_moderation']['log'] = $context->form['options']['log'];
      $block->content['workbench_moderation']['workbench_moderation_state_new'] = $context->form['options']['workbench_moderation_state_new'];

      node_form_panes_node_form_process_element($block->content['workbench_moderation'], $conf);
      if (!$conf['display_in_fieldset']) {
        $block->title = t('Workbench Moderation');
      }

      // Set access to false on the original rather than removing so that
      // vertical tabs doesn't clone it. I think this is due to references.
      $context->form['options']['log']['#access'] = FALSE;
      $context->form['options']['revision_information']['#access'] = FALSE;
    }
  }
  else {
    $block->content = t('Workbench Moderation options.');
  }

  return $block;
}

function node_form_panes_node_form_workbench_moderation_content_type_admin_title($subtype, $conf, $context) {
  return t('"@s" node form workbench moderation options', array('@s' => $context->identifier));
}
