<?php
/**
 * Created by PhpStorm.
 * User: wysselbie
 * Date: 13.02.18
 * Time: 14:26
 */


class Ambimax_StaticBlockScheduler_Test_Config_InstallTest extends EcomDev_PHPUnit_Test_Case_Config
{

    public function testIfInstallFileExists()
    {
        $this->assertFileExists($this->getModuleDir('/sql/ambimax_staticblockscheduler_setup/install-1.0.0.php'));
    }

    public function testIfTheSetupAliasReturnsTheRightInstance()
    {
        $this->assertResourceModelAlias(
            'ambimax_staticblockscheduler/setup',
            'Ambimax_StaticBlockScheduler_Model_Resource_Setup'
        );
    }

    public function testIfSetupHasBeenInstalledAndHasTheRightVersion()
    {
        $this->assertSetupScriptVersions(
            EcomDev_PHPUnit_Constraint_Config_Resource_Script::TYPE_SCRIPT_SCHEME,
            '1.0.0', '1.0.0',
            'Ambimax_StaticBlockScheduler'
        );
    }

    /**
     * @param $path
     * @return string
     */
    public function getModuleDir($path)
    {
        return Mage::getBaseDir() . '/app/code/community/Ambimax/StaticBlockScheduler' . $path;
    }
}
