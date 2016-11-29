<?php
/**
 * @file
 * Contains \Drupal\compro_custom\Form\ComproCustomForm.
 */
 
namespace Drupal\entity_log\Form;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\ConfigFormBase;
 
/**
 * Configure custom settings for this site.
 */
class EntityLogForm extends ConfigFormBase {
 
/**
 * Constructor for ComproCustomForm.
 *
 * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
 * The factory for configuration objects.
 */
 public function __construct(ConfigFactoryInterface $config_factory) {
   parent::__construct($config_factory);
 }
 
/**
 * Returns a unique string identifying the form.
 *
 * @return string
 * The unique string identifying the form.
 */
 public function getFormId() {
   return 'entity_log_form';
 }
 
/**
 * Gets the configuration names that will be editable.
 *
 * @return array
 * An array of configuration object names that are editable if called in
 * conjunction with the trait's config() method.
 */
 protected function getEditableConfigNames() {
   return ['entity_log.EntityConfig'];
 }
 
/**
 * Form constructor.
 *
 * @param array $form
 * An associative array containing the structure of the form.
 * @param \Drupal\Core\Form\FormStateInterface $form_state
 * The current state of the form.
 *
 * @return array
 * The form structure.
 */
 public function buildForm(array $form, FormStateInterface $form_state) {
  $entity_log = $this->config('entity_log.EntityConfig');
  $entity_log_form = $entity_log->get('entity_log_form');

  $options = $this->upload_options();

  $form['entity_log_form'] = array(
       '#type' => 'select',
       '#title' => t('Types'),
       '#description' => t('By default all types are included.'),
       '#options' => $options,
       '#multiple' => TRUE,
       '#default_value' => $entity_log_form,
   );
   return parent::buildForm($form, $form_state);
 }
 
/**
 * Form submission handler.
 *
 * @param array $form
 * An associative array containing the structure of the form.
 * @param \Drupal\Core\Form\FormStateInterface $form_state
 * The current state of the form.
 */
 public function submitForm(array &$form, FormStateInterface $form_state) {
   $this->config('entity_log.EntityConfig')
      ->set('entity_log_form', $form_state->getValue('entity_log_form'))
      ->save();
  }

/**
 * Form upload options.
 */
  protected function upload_options() {  
    //Get Options
    foreach(\Drupal::entityManager()->getDefinitions() as $id => $definition) {
      if (is_a($definition ,'Drupal\Core\Entity\ContentEntityType')) {
        $options[$id] = $id;
      }
    }
    return $options;
  }
}

