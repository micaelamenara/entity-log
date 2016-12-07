<?php

namespace Drupal\entity_log;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Database\Database;

class nodeEntityLog {

  /**
   * Update log status.
   */
  public function getStatus(EntityInterface $entity) {
    if ($entity->isPublished() == 0) {
      $status = 'Unpublished';
    }
    else {
      $status = 'Published';
    }
    return $status;
  }
}