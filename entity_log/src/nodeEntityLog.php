<?php

namespace Drupal\entity_log;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Database\Database;

class nodeEntityLog {

  /**
   * Update log action.
   */
  public function getLogAction(EntityInterface $entity) {
    $action = 'Update';
    if ($entity->original->isPublished() == 1 && $entity->isPublished() == 0) {
      $action = 'Unpublished';
    }
    if ($entity->original->isPublished() == 0 && $entity->isPublished() == 1) {
      $action = 'Published';
    }

    return $action;
  }
}