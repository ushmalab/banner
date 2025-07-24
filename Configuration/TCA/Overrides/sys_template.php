<?php
defined('TYPO3') or die('Access denied.');

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

// Register static TypoScript configuration
ExtensionManagementUtility::addStaticFile(
    'banner_flash_message',
    'Configuration/TypoScript',
    'Banner Flash Message'
);

