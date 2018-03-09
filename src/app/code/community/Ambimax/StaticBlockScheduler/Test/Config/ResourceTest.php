<?php
/**
 * Created by PhpStorm.
 * User: jb
 * Date: 22.12.17
 * Time: 09:28
 */

class Ambimax_StaticBlockScheduler_Test_Model_Resource_StaticBlockCollectionTest
    extends EcomDev_PHPUnit_Test_Case_Config
{

    public function testIfAResourceModelStaticBlockCollectionIsDefined()
    {
        $this->assertResourceModelAlias(
            'ambimax_staticblockscheduler/staticBlockCollection',
            'Ambimax_StaticBlockScheduler_Model_Resource_StaticBlockCollection',
            'Model StaticBlockCollection is not defined'
        );
    }


    public function testIfAResourceModelStaticBlockIsDefined()
    {
        $this->assertResourceModelAlias(
            'ambimax_staticblockscheduler/staticBlock',
            'Ambimax_StaticBlockScheduler_Model_Resource_StaticBlock',
            'Model StaticBlock is not defined'
        );
    }


}