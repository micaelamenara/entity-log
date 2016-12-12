<?php

namespace Drupal\entity_log\Services;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Config\Entity\ConfigEntityInterface;

class ValidateLog {

  /**
   * Validate log.
   */
  public function validate(EntityInterface $entity) {
    
    if ($this->is_content($entity) && $this->is_included($entity) && $this->not_content_moderation($entity)) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  protected function is_included(EntityInterface $entity){
    $config = \Drupal::configFactory()
        ->getEditable('entity_log.EntityConfig');
    $entity_log_form = $config->get('entity_log_form');
    $et = $entity->getEntityTypeId();

    if(in_array($et, $entity_log_form) || $entity_log_form == null || empty($entity_log_form)) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  protected function is_content(EntityInterface $entity){
    if (!($entity instanceof ConfigEntityInterface)){
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  protected function not_content_moderation(EntityInterface $entity){
    if ($entity->getEntityTypeId() == 'content_moderation_state'){
      return FALSE;
    }
    else {
      return TRUE;
    }
  }

}