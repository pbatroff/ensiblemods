<?php

require_once 'ensiblemods.civix.php';

use CRM_Ensiblemods_ExtensionUtil as E;

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
