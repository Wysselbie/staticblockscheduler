<?php

class Ambimax_StaticBlockScheduler_Test_Config_ModelTest extends EcomDev_PHPUnit_Test_Case_Config
{
    public function testIfAModelStaticBlockIsDefined()
    {
        $this->assertModelAlias(
            'ambimax_staticblockscheduler/staticBlock',
            'Ambimax_StaticBlockScheduler_Model_StaticBlock',
            'Model StaticBlock is not defined'
        );
    }

    public function testIfTheStaticBlockAliasReturnsTheRightInstance()
    {
        $this->assertInstanceOf(
            Ambimax_StaticBlockScheduler_Model_StaticBlock::class,
            Mage::getModel('ambimax_staticblockscheduler/staticBlock'),
            'Wrong Instance');
    }

}