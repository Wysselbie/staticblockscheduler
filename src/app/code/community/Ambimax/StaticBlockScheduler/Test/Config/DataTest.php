<?php


class Ambimax_StaticBlockScheduler_Test_Config_DataTest extends EcomDev_PHPUnit_Test_Case_Config
{
    protected $_baseDir;
    protected $_dirToDataPhpFile;

    public function setUp()
    {
        $this->_baseDir = Mage::getBaseDir();

        $this->_dirToDataPhpFile = $this->_baseDir
            . '/app/code/community/Ambimax/StaticBlockScheduler'
            . '/Helper/Data.php';

    }

    public function testIfSetupFileExists()
    {
        $this->assertFileExists($this->_dirToDataPhpFile);
    }
}