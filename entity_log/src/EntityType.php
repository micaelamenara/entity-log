<?php

namespace Drupal\entity_log;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Database\Database;
use Drupal\entity_log\nodeEntityLog;
use Drupal\entity_log\UserEntityLog;

class EntityType {

  /**
   * Update log action.
   */
  public function getAction(EntityInterface $entity) {
    $action = 'UPDATE';

    if ($entity->getEntityTypeId() == 'node'){
      $logAction = new nodeEntityLog();
      $action = $logAction->getLogAction($entity);
    }

    if ($entity->getEntityTypeId() == 'user'){
      $logAction = new UserEntityLog();
      $action = $logAction->getLogAction($entity);
    }
    
    return $action;
  }

}