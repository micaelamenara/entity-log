<?php

namespace Drupal\entity_log;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Database\Database;

class nodeEntityLog {

  /**
   * Update log action.
   */
  public function getLogAction(EntityInterface $entity) {
    $action = 'UPDATE';
    if ($entity->original->isPublished() == 1 && $entity->isPublished() == 0) {
      $action = 'UNPUBLISHED';
    }
    if ($entity->original->isPublished() == 0 && $entity->isPublished() == 1) {
      $action = 'PUBLISHED';
    }

    return $action;
  }
}