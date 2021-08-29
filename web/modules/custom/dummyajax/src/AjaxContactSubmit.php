<?php

namespace Drupal\dummyajax;

use Drupal\Component\Utility\Html;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class AjaxContactSubmit.
 *
 * @package Drupal\dummyajax\AjaxContactSubmit
 */
class AjaxContactSubmit {

  /**
   * Ajax form submit callback.
   *
   * @param array $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *
   * @return \Drupal\Core\Ajax\AjaxResponse
   */
  public function ajaxSubmitCallback(array &$form, FormStateInterface $form_state): AjaxResponse {
    $ajax_response = new AjaxResponse();
    $message = [
      '#theme' => 'status_messages',
      '#message_list' => \Drupal::messenger()->deleteAll(),
      '#status_headings' => [
        'status' => t('Status message'),
        'error' => t('Error message'),
        'warning' => t('Warning message'),
      ],
    ];
    $messages = \Drupal::service('renderer')->render($message);
    $ajax_response->addCommand(new HtmlCommand('#' . Html::getClass($form['form_id']['#value']) . '-messages', $messages));
    return $ajax_response;
  }

}
