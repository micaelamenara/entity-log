<?php

/**
* @file
* Definition of Drupal\entity_type\Plugin\views\filter\EntityTypeFilter.
*/

namespace Drupal\entity_log\Plugin\views\filter;

use Drupal\views\Plugin\views\display\DisplayPluginBase;
use Drupal\views\Plugin\views\filter\InOperator;
use Drupal\views\ViewExecutable;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\ConfigFormBase;

/**
* Filters by given list of entity type options.
*
* @ingroup views_filter_handlers
*
* @ViewsFilter("entity_log_entity_type_field")
*/
class EntityTypeFilter extends InOperator {

  /**
   * {@inheritdoc}
   */
  public function init(ViewExecutable $view, DisplayPluginBase $display, array &$options = NULL) {
    parent::init($view, $display, $options);
    $this->valueTitle = t('Allowed entity types');
    $this->definition['options callback'] = array($this, 'generateOptions');
  }

  /**
   * Override the query so that no filtering takes place if the user doesn't
   * select any options.
   */
  public function query() {
    if (!empty($this->value)) {
      parent::query();
    }
  }

  /**
   * Skip validation if no options have been chosen so we can use it as a
   * non-filter.
   */
  public function validate() {
    if (!empty($this->value)) {
      parent::validate();
    }
  }

  /**
   * Helper function that generates the options.
   * @return array
   */
  public function generateOptions() {
    // Array keys are used to compare with the table field values.
    foreach(\Drupal::entityManager()->getDefinitions() as $id => $definition) {
      if (is_a($definition ,'Drupal\Core\Entity\ContentEntityType')) {
        $options[$id] = $id;
      }
    }
    return $options;
  }

}