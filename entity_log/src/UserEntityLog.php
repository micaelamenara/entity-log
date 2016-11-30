<?php

namespace Drupal\entity_log;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Database\Database;

class UserEntityLog {

  /**
   * Update log action.
   */
  public function getLogAction(EntityInterface $entity) {
    $action = 'Update';
    if ($entity->original->isActive() == 1 && $entity->isActive() == 0) {
      $action = 'Blocked';
    }
    if ($entity->original->isActive() == 0 && $entity->isActive() == 1) {
      $action = 'Active';
    }

    return $action;
  }
}