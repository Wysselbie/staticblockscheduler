<?php
/** @var Ambimax_StaticBlockScheduler_Model_Resource_Setup $installer */
$installer = $this;

$installer->startSetup();

$table = $installer->getTable('cms/block');

$installer->getConnection()->addColumn(
    $table,
    'is_active_from',
    array(
        'type' => Varien_Db_Ddl_Table::TYPE_DATE,
        'length' => 25,
        'nullable' => true,
        'default' => null,
        'comment' => 'Created by Ambimax_StaticBlockScheduler. Block is active from',
    )
);

$installer->getConnection()->addColumn(
    $table,
    'is_active_to',
    array(
        'type' => Varien_Db_Ddl_Table::TYPE_DATE,
        'length' => 25,
        'nullable' => true,
        'default' => null,
        'comment' => 'Created by Ambimax_StaticBlockScheduler. Block is active to',
    )
);


$installer->endSetup();