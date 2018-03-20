<?php
/**
 * Created by PhpStorm.
 * User: wysselbie
 * Date: 13.02.18
 * Time: 14:44
 */

/** @var Ambimax_StaticBlockScheduler_Model_Resource_Setup $installer */
$installer = $this;

$installer->startSetup();

$table = $installer->getTable('cms/block');

$installer->getConnection()->addColumn(
    $table,
    'is_active_from',
    array(
        'type' => Varien_Db_Ddl_Table::TYPE_DATETIME,
        'length' => 25,
        'nullable' => true,
        'default' => null,
        'comment' => 'Created by Ambimax_StaticBlockScheduler'
    )
);

$installer->getConnection()->addColumn(
    $table,
    'is_active_to',
    array(
        'type' => Varien_Db_Ddl_Table::TYPE_DATETIME,
        'length' => 25,
        'nullable' => true,
        'default' => null,
        'comment' => 'Created by Ambimax_StaticBlockScheduler'
    )
);


$installer->endSetup();