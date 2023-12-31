<?php
/**
 * OpenMage
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available at https://opensource.org/license/osl-3-0-php
 *
 * @category   Mage
 * @package    Mage_Sendfriend
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://www.magento.com)
 * @copyright  Copyright (c) 2020-2022 The OpenMage Contributors (https://www.openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Sendfriend_Model_Resource_Setup $installer */
$installer = $this;
$installer->startSetup();

$installer->getConnection()->dropKey($installer->getTable('sendfriend/sendfriend'), 'ip');
$installer->getConnection()->dropKey($installer->getTable('sendfriend/sendfriend'), 'time');
$installer->getConnection()->modifyColumn(
    $installer->getTable('sendfriend/sendfriend'),
    'log_id',
    'int(10) unsigned NOT NULL'
);
$installer->getConnection()->modifyColumn(
    $installer->getTable('sendfriend/sendfriend'),
    'ip',
    'bigint(20) NOT NULL DEFAULT 0'
);
$installer->getConnection()->modifyColumn(
    $installer->getTable('sendfriend/sendfriend'),
    'time',
    'int(10) unsigned NOT NULL'
);
$installer->getConnection()->addKey(
    $installer->getTable('sendfriend/sendfriend'),
    'IDX_REMOTE_ADDR',
    ['ip']
);
$installer->getConnection()->addKey(
    $installer->getTable('sendfriend/sendfriend'),
    'IDX_LOG_TIME',
    ['time']
);
$installer->endSetup();
