<?php


class Ambimax_StaticBlockScheduler_Test_Config_BlockTest extends EcomDev_PHPUnit_Test_Case_Config
{
    protected $_dirArray = array(
        'base' => 'app/code/community/Ambimax/StaticBlockScheduler',
        'layout' => 'app/design/frontend/base/default/layout/ambimax',
        'template' => 'app/design/frontend/base/default/template/ambimax/staticblockscheduler'
    );


    public function testIfBlockClassFileExists()
    {
        $this->assertFileExists($this->getModuleDir('/Block/StaticBlock.php'));
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
    }

    public function getModuleDir($path, $area = 'base')
    {
        return Mage::getBaseDir() . DS . $this->_dirArray[$area] . DS . $path;
    }
}
