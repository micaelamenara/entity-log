<?php

namespace Drupal\entity_log;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Database\Database;

class entityLog {

  /**
   * Update log.
   */
  public function insertLog(EntityInterface $entity, $action) {
    
    $uid = \Drupal::currentUser()->id();
    $conn = Database::getConnection();

    $conn->insert('entity_log')->fields(
    array(
      'action' => $action,
      'entity_type' => $entity->getEntityTypeId(),
      'entity_bundle' => $entity->bundle(),
      'eid' => $entity->id(),
      'uid' => $uid,
      'date' => REQUEST_TIME,
      )
    )->execute();

  }

}