<?php

namespace Drupal\entity_log;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Database\Database;

class UserEntityLog {

  /**
   * Update log status.
   */
  public function getStatus(EntityInterface $entity) {
    $status = NULL;
    if ($entity->isActive() == 0) {
      $status = 'Blocked';
    }
    else {
      $status = 'Active';
    }

    return $status;
  }
}