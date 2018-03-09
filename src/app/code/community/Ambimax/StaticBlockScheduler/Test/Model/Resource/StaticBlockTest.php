<?php

class Ambimax_StaticBlockScheduler_Test_Model_Resource_StaticBlockTest extends EcomDev_PHPUnit_Test_Case_Config
{

    public function testIfTheStaticBlockAliasReturnsTheRightInstance()
    {
        $this->assertInstanceOf(
            Ambimax_StaticBlockScheduler_Model_Resource_StaticBlock::class,
            Mage::getResourceModel('ambimax_staticblockscheduler/staticBlock'),
            'Wrong Instance'
        );
    }
}