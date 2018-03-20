<?php
/**
 * Created by PhpStorm.
 * User: wysselbie
 * Date: 14.02.18
 * Time: 14:13
 */


class Ambimax_StaticBlockScheduler_Test_sql_InstallTest extends EcomDev_PHPUnit_Test_Case
{
    /** @var Varien_Db_Adapter_Interface */
    protected $_dbConnection;

    public function setUp()
    {
        $this->_dbConnection = Mage::getSingleton('core/resource')->getConnection('read');
    }

    public function testIfTheColumnIsActiveFromHasBeenAddedToCmsBlockTable()
    {
        $this->assertTableColumnExists('cms_block', 'is_active_from');
    }


    public function testIfTheColumnIsActiveToHasBeenAddedToCmsBlockTable()
    {
        $this->assertTableColumnExists('cms_block', 'is_active_to');
    }

    public function assertTableColumnExists($tableName, $columnName)
    {
        $this->assertTrue(
            $this
                ->_dbConnection
                ->tableColumnExists(
                    $tableName,
                    $columnName
                )
        );
    }
}