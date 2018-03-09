<?php
/**
 * Created by PhpStorm.
 * User: wysselbie
 * Date: 15.02.18
 * Time: 15:29
 */


class Ambimax_StaticBlockScheduler_Test_Config_SetupTest extends EcomDev_PHPUnit_Test_Case_Config
{
    protected $_baseDir;
    protected $_dirToSetupPhpfile;

    public function setUp()
    {
        $this->_baseDir = Mage::getBaseDir();

        $this->_dirToSetupPhpfile = $this->_baseDir
            . '/app/code/community/Ambimax/StaticBlockScheduler'
            . '/Model/Resource/Setup.php';

    }

    public function testIfSetupFileExists()
    {
        $this->assertFileExists($this->_dirToSetupPhpfile);
    }
}
