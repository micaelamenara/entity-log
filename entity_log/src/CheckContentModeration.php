<?php
namespace Drupal\entity_log;

use Drupal\Core\Entity\EntityInterface;
use Drupal\entity_log\entityLog;
use Drupal\Core\Database\Database;
use Drupal\Core\Config\Entity\ConfigEntityInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Drupal\Component\Serialization\Json;
use Drupal\Core\Entity\EntityManagerInterface;


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