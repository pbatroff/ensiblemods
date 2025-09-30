<?php

require_once 'ensiblemods.civix.php';

use CRM_Ensiblemods_ExtensionUtil as E;
use Symfony\Component\DependencyInjection\ContainerBuilder;

const FUTURE_DATE_2_weeks = 14;
const FUTURE_DATE_3_weeks = 21;
const FUTURE_DATE_4_weeks =28;

function ensiblemods_civicrm_container(ContainerBuilder $container) {
  $container->findDefinition('dispatcher')->addMethodCall('addListener', ['civi.token.list', 'ensiblemods_register_tokens'])->setPublic(TRUE);
  $container->findDefinition('dispatcher')->addMethodCall('addListener', ['civi.token.eval', 'ensiblemods_evaluate_tokens'])->setPublic(TRUE);
}


function ensiblemods_register_tokens(\Civi\Token\Event\TokenRegisterEvent $e) {
  $e->entity('domain')->register('future' . FUTURE_DATE_2_weeks . 'days',ts('Future date in ' . FUTURE_DATE_2_weeks . ' days' ));
  $e->entity('domain')->register('future' . FUTURE_DATE_3_weeks . 'days',ts('Future date in ' . FUTURE_DATE_3_weeks . ' days' ));
  $e->entity('domain')->register('future' . FUTURE_DATE_4_weeks . 'days',ts('Future date in ' . FUTURE_DATE_4_weeks . ' days' ));
}


function ensiblemods_evaluate_tokens(\Civi\Token\Event\TokenValueEvent $e) {
  foreach ($e->getRows() as $key => $row) {
    $row->format('text/html');
    $row->tokens('domain', 'future' . FUTURE_DATE_2_weeks . 'days', date('d.m.Y', strtotime('+' . FUTURE_DATE_2_weeks . 'days')));
    $row->tokens('domain', 'future' . FUTURE_DATE_3_weeks . 'days', date('d.m.Y', strtotime('+' . FUTURE_DATE_3_weeks . 'days')));
    $row->tokens('domain', 'future' . FUTURE_DATE_4_weeks . 'days', date('d.m.Y', strtotime('+' . FUTURE_DATE_4_weeks . 'days')));
  }
}


/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function ensiblemods_civicrm_config(&$config): void {
  _ensiblemods_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function ensiblemods_civicrm_install(): void {
  _ensiblemods_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function ensiblemods_civicrm_enable(): void {
  _ensiblemods_civix_civicrm_enable();
}
