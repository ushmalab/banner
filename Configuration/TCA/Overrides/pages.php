<?php
// Configuration/TCA/Overrides/pages.php

defined('TYPO3') or die();

// Add flash message toggle field to pages
$tempColumns = [
    'tx_flashmessage_show' => [
        'label' => 'Show Global Flash Messages',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'items' => [
                [
                    'label' => '',
                    'value' => '',
                ]
            ],
            'default' => 1, // Default ON
        ],
    ],
];

// Add the field to the TCA
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $tempColumns);

// Add the field to the "Appearance" tab after subtitle
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    'tx_flashmessage_show',
    '',
    'after:subtitle'
);
