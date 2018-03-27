<?php

class Ambimax_StaticBlockScheduler_Test_Config_ObserverTest extends EcomDev_PHPUnit_Test_Case_Config
{
    protected $_baseDir;
    protected $_dirToObserverPhpFile;

    public function setUp()
    {
        $this->_baseDir = Mage::getBaseDir();
        $this->_dirToObserverPhpFile = $_dirToObserverPhpFile = $this->_baseDir
            . '/app/code/community/Ambimax/StaticBlockScheduler'
            . '/Model/Observer.php';
    }

    public function testIfObserverPhpFileExistsAndEventObserverIsDefined()
    {
        $this->assertFileExists($this->_dirToObserverPhpFile);
        $this->assertEventObserverDefined(
            'adminhtml',
            'adminhtml_block_html_before',
            'ambimax_staticblockscheduler/observer',
            'addTheFromAndToDateFieldsToFieldset'
        );
    }

}