<?php
// Configuration/TCA/Overrides/tt_content.php

defined('TYPO3') or die();

$contentElementLanguageFilePrefix = 'LLL:EXT:banner_flash_message/Resources/Private/Language/ContentElements.xlf:';
$coreLanguageFilePrefix = 'LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:';
$frontendLanguageFilePrefix = 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:';

// ==================== columnsOverrides - Regular Text Element ==================== //

$GLOBALS['TCA']['tt_content']['types']['text']['columnsOverrides']['bodytext'] = [
    'config' => [
        'type' => 'text',
        'enableRichtext' => true,
        'richtextConfiguration' => 'banner_flash_message',
    ],
];


// Flash CE
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'label' => $contentElementLanguageFilePrefix . 'flash.title',
        'value' => 'flash',
        'icon' => 'mimetypes-x-content-header',
        'group' => 'Content Elements',
        'description' => $contentElementLanguageFilePrefix . 'flash.description',
    ],
    'text',
    'after'
);

// Register icon
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['flash'] = 'mimetypes-x-content-header';

// Configure the content element
$GLOBALS['TCA']['tt_content']['types']['flash'] = [
    'showitem' => '
        --div--;' . $coreLanguageFilePrefix . 'general,
            --palette--;' . $frontendLanguageFilePrefix . 'palette.general;general,
            --palette--;' . $frontendLanguageFilePrefix . 'palette.headers;headers,
            bodytext;' . $contentElementLanguageFilePrefix . 'flash.bodytext,
        --div--;' . $contentElementLanguageFilePrefix . 'flash.tabs.styling,
            --palette--;;flash_colors,
            tx_flashmessage_position;' . $contentElementLanguageFilePrefix . 'flash.tx_flashmessage_position,
        --div--;' . $frontendLanguageFilePrefix . 'tabs.appearance,
            --palette--;' . $frontendLanguageFilePrefix . 'palette.frames;frames,
            --palette--;' . $frontendLanguageFilePrefix . 'palette.appearanceLinks;appearanceLinks,
        --div--;' . $coreLanguageFilePrefix . 'language,
            --palette--;;language,
        --div--;' . $coreLanguageFilePrefix . 'access,
            --palette--;;hidden,
            --palette--;' . $frontendLanguageFilePrefix . 'palette.access;access,
        --div--;' . $coreLanguageFilePrefix . 'categories,categories,
        --div--;' . $coreLanguageFilePrefix . 'notes,rowDescription,
        --div--;' . $coreLanguageFilePrefix . 'extended,
    ',
    'columnsOverrides' => [
        'bodytext' => [
            'label' => $contentElementLanguageFilePrefix . 'flash.bodytext',
            'description' => $contentElementLanguageFilePrefix . 'flash.bodytext.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'enableRichtext' => true,
                'richtextConfiguration' => 'banner_flash_message',
            ]
        ]
    ]
];

$temporaryDataColumnReferences = [
    'tx_flashmessage_bgcolor' => [
        'label' => $contentElementLanguageFilePrefix . 'flash.tx_flashmessage_bgcolor',
        'description' => $contentElementLanguageFilePrefix . 'flash.tx_flashmessage_bgcolor.description',
        'config' => [
            'type' => 'color',
            'size' => 10,
            'default' => '#007bff',
        ],
    ],
    'tx_flashmessage_textcolor' => [
        'label' => $contentElementLanguageFilePrefix . 'flash.tx_flashmessage_textcolor',
        'description' => $contentElementLanguageFilePrefix . 'flash.tx_flashmessage_textcolor.description',
        'config' => [
            'type' => 'color',
            'size' => 10,
            'default' => '#ffffff',
        ],
    ],
    'tx_flashmessage_position' => [
        'label' => $contentElementLanguageFilePrefix . 'flash.tx_flashmessage_position',
        'description' => $contentElementLanguageFilePrefix . 'flash.tx_flashmessage_position.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                [
                    'label' => $contentElementLanguageFilePrefix . 'flash.position.top',
                    'value' => 'top',
                ],
                [
                    'label' => $contentElementLanguageFilePrefix . 'flash.position.bottom',
                    'value' => 'bottom',
                ],
            ],
            'default' => 'top',
        ],
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $temporaryDataColumnReferences);

// Define color palette
$GLOBALS['TCA']['tt_content']['palettes']['flash_colors'] = [
    'label' => 'Colors',
    'showitem' => '
        tx_flashmessage_bgcolor,
        tx_flashmessage_textcolor
    ',
];
