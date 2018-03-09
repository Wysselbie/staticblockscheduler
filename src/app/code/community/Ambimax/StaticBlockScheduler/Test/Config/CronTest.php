<?php

class Ambimax_StaticBlockScheduler_Test_Config_CronTest extends EcomDev_PHPUnit_Test_Case_Config{

    public function testIfACronModelIsDefined()
    {
        $this->assertModelAlias(
            'ambimax_staticblockscheduler/cron',
            'Ambimax_StaticBlockScheduler_Model_Cron'
        );
    }

    public function testIfTheCronAliasReturnsTheRightInstance()
    {
        $this->assertInstanceOf(
            Ambimax_StaticBlockScheduler_Model_Cron::class,
            Mage::getModel('ambimax_staticblockscheduler/cron'),
            'Wrong Instance'
        );
    }

}