<?php
namespace Drupal\entity_log\Services;

use Drupal\Core\Entity\EntityInterface;

class CheckContentModeration {

	public function checkCM (EntityInterface $entity) {
		$moderation_state = NULL;

    if ($entity->getEntityTypeId() == 'node') {
    	
      $moduleHandler = \Drupal::service('module_handler');
			if ($moduleHandler->moduleExists('content_moderation')  && $entity->moderation_state->target_id) {
          $moderation_state = $entity->moderation_state->target_id;
			}
    }
    return $moderation_state;
  }
}