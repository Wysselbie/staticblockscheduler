<?php


class Ambimax_StaticBlockScheduler_Test_Config_SystemTest extends EcomDev_PHPUnit_Test_Case_Config
{
    protected $_baseDir;
    protected $_dirToSystemXml;

    public function setUp()
    {
        $this->_baseDir = Mage::getBaseDir();

        $this->_dirToSystemXml = $this->_baseDir
            . '/app/code/community/Ambimax/StaticBlockScheduler/etc/system.xml';

    }

    public function testIfSetupFileExists()
    {
        $this->assertFileExists($this->_dirToSystemXml);
    }

    public function testIfSystemXmlHasEnabledAsAField()
    {
        $systemXmlAsArray = json_decode(json_encode(simplexml_load_file($this->_dirToSystemXml)), true);
        $fieldsInSystemXml = $systemXmlAsArray['sections']['design']['groups']['ambimax_staticblockscheduler']['fields'];

        $this->assertArrayHasKey('enabled', $fieldsInSystemXml);
    }
}
