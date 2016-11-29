<?php

namespace Drupal\entity_log;

use Drupal\Core\Entity\EntityInterface;
use Drupal\entity_log\entityLog;
use Drupal\Core\Database\Database;
use Drupal\Core\Config\Entity\ConfigEntityInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Drupal\Component\Serialization\Json;
use Drupal\Core\Entity\EntityManagerInterface;

class ValidateLog {

  /**
   * Validate log.
   */
  public function validate(EntityInterface $entity) {
    
    if ($this->is_content($entity) && $this->is_included($entity)) {
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
    if (!($entity instanceof  ConfigEntityInterface)){
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

}