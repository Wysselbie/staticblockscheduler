<?php


class Ambimax_StaticBlockScheduler_Test_Config_TranslateTest extends EcomDev_PHPUnit_Test_Case_Config
{
    protected $_baseDir;
    protected $_dirToTranslateCsv;

    public function setUp()
    {
        $this->_baseDir = Mage::getBaseDir();

        $this->_dirToTranslateCsv = $this->_baseDir
            . DS
            . 'app/locale/de_DE/Ambimax_StaticBlockScheduler.csv';

    }

    public function testIfTranslateCsvExists()
    {
        $this->assertFileExists($this->_dirToTranslateCsv);
    }
}
