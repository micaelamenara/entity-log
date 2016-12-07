<?php

namespace Drupal\entity_log;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Database\Database;
use Drupal\entity_log\nodeEntityLog;
use Drupal\entity_log\UserEntityLog;

class EntityType {

  /**
   * Update log status.
   */
  public function getStatus(EntityInterface $entity) {
    $status = NULL;

    if ($entity->getEntityTypeId() == 'node'){
      $logNode = new nodeEntityLog();
      $status = $logNode->getStatus($entity);
    }

    if ($entity->getEntityTypeId() == 'user'){
      $logUser = new UserEntityLog();
      $status = $logUser->getStatus($entity);
    }
    
    return $status;
  }

}