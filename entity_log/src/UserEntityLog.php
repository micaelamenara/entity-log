<?php

namespace Drupal\entity_log;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Database\Database;

class UserEntityLog {

  /**
   * Update log action.
   */
  public function getLogAction(EntityInterface $entity) {
    $action = 'UPDATE';
    if ($entity->original->isActive() == 1 && $entity->isActive() == 0) {
      $action = 'BLOCKED';
    }
    if ($entity->original->isActive() == 0 && $entity->isActive() == 1) {
      $action = 'ACTIVE';
    }

    return $action;
  }
}