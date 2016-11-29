<?php

/**
 * @file
 * Provide views data for entity_log.module.
 *
 * @ingroup views_module_handlers
 */

/**
 * Implements hook_views_data().
 */
function entity_log_views_data() {
  $data = [];
  $data['entity_log'] = [];
  $data['entity_log']['table'] = [];
  $data['entity_log']['table']['group'] = t('Entity log');
  $data['entity_log']['table']['provider'] = 'entity_log';

  $data['entity_log']['table']['base'] = array(
    'field' => 'id',
    // Label in the UI.
    'title' => t('Entity log'),
    // Longer description in the UI. Required.
    'help' => t('Entity log'),
    'weight' => -10,
  );
  $data['entity_log']['id'] = array(
    'title' => t('Id'),
    'help' => t('Id'),
    'field' => array(
      'id' => 'numeric',
    ),
    'sort' => array(
      'id' => 'standard',
    ),

    'filter' => array(
      'id' => 'numeric',
    ),

    'argument' => array(
      'id' => 'numeric',
    ),
  );

  $data['entity_log']['uid'] = array(
    'title' => t('User'),
    'help' => t('User'),
    'field' => array(
      'id' => 'numeric',
    ),
    'sort' => array(
      'id' => 'standard',
    ),
    'filter' => array(
      'id' => 'numeric',
    ),
    'argument' => array(
      'id' => 'numeric',
    ),
  );
  $data['entity_log']['eid'] = array(
    'title' => t('Entity id'),
    'help' => t('Entity id'),
    'field' => array(
      'id' => 'numeric',
    ),
    'sort' => array(
      'id' => 'standard',
    ),
    'filter' => array(
      'id' => 'numeric',
    ),
    'argument' => array(
      'id' => 'numeric',
    ),
  );

  $data['entity_log']['entity_type'] = array(
    'title' => t('Entity type'),
    'help' => t('Entity type'),

    'field' => array(
      'id' => 'standard',
    ),
    'sort' => array(
      'id' => 'standard',
    ),
    'filter' => array(
      'id' => 'string',
    ),
    'argument' => array(
      'id' => 'string',
    ),
  );

  $data['entity_log']['entity_bundle'] = array(
    'title' => t('Entity bundle'),
    'help' => t('Entity bundle'),

    'field' => array(
      'id' => 'standard',
    ),
    'sort' => array(
      'id' => 'standard',
    ),
    'filter' => array(
      'id' => 'string',
    ),
    'argument' => array(
      'id' => 'string',
    ),
  );

  $data['entity_log']['date'] = array(
    'title' => t('Date'),
    'help' => t('Date'),

    'field' => array(
      'id' => 'standard',
    ),
    'sort' => array(
      'id' => 'standard',
    ),
    'filter' => array(
      'id' => 'string',
    ),
    'argument' => array(
      'id' => 'string',
    ),
  );
$data['entity_log']['action'] = array(
    'title' => t('Action'),
    'help' => t('Action'),

    'field' => array(
      'id' => 'standard',
    ),
    'sort' => array(
      'id' => 'standard',
    ),
    'filter' => array(
      'id' => 'string',
    ),
    'argument' => array(
      'id' => 'string',
    ),
  );

  return $data;
}
