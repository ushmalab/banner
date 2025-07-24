<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Banner Flash Message',
    'description' => '',
    'category' => 'templates',
    'constraints' => [
       'depends' => [
            'typo3' => '13.0.0-13.4.99',
            'fluid_styled_content' => '13.0.0-13.4.99',
            'rte_ckeditor' => '13.0.0-13.4.99',
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'FlashMessage\\BannerFlashMessage\\' => 'Classes',
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Ushmala',
    'author_email' => 'ushmala.de@gmail.com',
    'author_company' => 'Flash Message',
    'version' => '1.0.0',
];
