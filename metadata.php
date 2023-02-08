<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

/**
 * Metadata version
 */
$sMetadataVersion = '2.1';

/**
 * Module information
 */
$aModule = [
    'id'          => 'oe_installment',
    'title'       => 'Installment module',
    'description' =>  '',
    'thumbnail'   => 'out/pictures/logo.png',
    'version'     => '1.0.0',
    'author'      => 'Winspiker',
    'url'         => 'https://github.com/winspiker/module-installment',
    'email'       => 'hidemysword69@gmail.com',
    'extend'      => [
        \OxidEsales\Eshop\Application\Model\Article::class => OxidEsales\InstallmentModule\Model\Article::class,
    ],
    'events' => [
        'onActivate' => '\OxidEsales\InstallmentModule\Core\ModuleEvents::onActivate',
        'onDeactivate' => '\OxidEsales\InstallmentModule\Core\ModuleEvents::onDeactivate'
    ],
    'blocks'      => [
        [
            'template' => 'page/details/inc/productmain.tpl',
            'block' => 'details_productmain_tprice',
            'file' => 'views/blocks/oetm_product.tpl'
        ],
        [
            'template' => 'article_main.tpl',
            'block' => 'admin_article_main_form',
            'file' => 'views/blocks/oetm_admin_articles.tpl',
        ]
    ],
];
