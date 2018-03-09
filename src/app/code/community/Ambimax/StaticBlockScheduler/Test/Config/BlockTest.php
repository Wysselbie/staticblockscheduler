<?php


class Ambimax_StaticBlockScheduler_Test_Config_BlockTest extends EcomDev_PHPUnit_Test_Case_Config
{
    protected $_dirArray;

    public function setUp()
    {
        $this->_dirArray[''] = '/app/code/community/Ambimax/StaticBlockScheduler';
        $this->_dirArray['layout'] = '/app/design/frontend/base/default/layout/ambimax';
        $this->_dirArray['template'] = '/app/design/frontend/base/default/template/ambimax/staticblockscheduler';

    }

    public function testIfBlockClassFileExists()
    {
        $this->assertFileExists($this->getModuleDir('/Block/StaticBlock.php'));
    }

    public function testIfTemplateFileExists()
    {
        $this->assertFileExists($this->getModuleDir('/staticBlock.phtml', 'template'));
    }

    public function testIfLayoutXmlFileExists()
    {
        $this->assertFileExists($this->getModuleDir('/staticblockscheduler.xml', 'layout'));
    }

    public function testIfBlockAliasReturnsTheRightInstance()
    {
        $this->assertBlockAlias(
            'ambimax_staticblockscheduler/staticBlock',
            Ambimax_StaticBlockScheduler_Block_StaticBlock::class
        );
        /*
         * TODO InstanceOf-Test, sobald klar ist, wie ein StaticBlock-Objekt instanziiert werden kann, das sinnvolle Daten enthällt.
         */
    }

    public function getModuleDir($path, $area = '')
    {
        return Mage::getBaseDir() . $this->_dirArray["$area"] . $path;
    }
}
