<?php

class Ambimax_StaticBlockScheduler_Test_Config_ModuleTest extends EcomDev_PHPUnit_Test_Case_Config
{
    public function testModuleIsActive()
    {
        $this->assertModuleIsActive(
            'Module is not active',
            'Ambimax_StaticBlockScheduler');
    }

    public function testIsInTheRightNamespace()
    {
        $this->assertModuleCodePool(
            'community',
            'Module is in the wrong codepool',
            'Ambimax_StaticBlockScheduler' );

    }

    public function testVersionOfTheModule()
    {
        $this->assertModuleVersion(
            '1.0.0',
            'Module has the wrong version',
            'Ambimax_StaticBlockScheduler');
    }

}