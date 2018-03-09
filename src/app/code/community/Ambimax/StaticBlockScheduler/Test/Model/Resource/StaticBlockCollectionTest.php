<?php

class Ambimax_StaticBlockScheduler_Test_Model_Resource_StaticBlockCollectionTest
    extends EcomDev_PHPUnit_Test_Case_Config
{

    public function testIfTheStaticBlockCollectionAliasReturnsTheRightInstance()
    {
        $this->assertInstanceOf(
            Ambimax_StaticBlockScheduler_Model_Resource_StaticBlockCollection::class,
            Mage::getResourceModel('ambimax_staticblockscheduler/staticBlockCollection'),
            'Wrong Instance'
        );

        $this->assertInstanceOf(
            Mage_Cms_Model_Resource_Block_Collection::class,
//            Varien_Data_Collection_Db::class,
            Mage::getResourceModel('ambimax_staticblockscheduler/staticBlockCollection')
        );

    }

    /**
     * @loadFixture ~Ambimax_StaticBlockScheduler/default
     */
    public function testCollectionReturnsStaticBlocks()
    {
        /** @var  Ambimax_StaticBlockScheduler_Model_Resource_StaticBlockCollection $staticBlockCollection */
        $staticBlockCollection = new Ambimax_StaticBlockScheduler_Model_Resource_StaticBlockCollection();

        foreach ($staticBlockCollection as $item) {
            $this->assertInstanceOf(
                Ambimax_StaticBlockScheduler_Model_StaticBlock::class,
                $item
            );
        }
        $this->assertSame(4, $staticBlockCollection->getSize());
    }

    public function testGetStaticBlockCollection()
    {
        $staticBlockCollection = new Ambimax_StaticBlockScheduler_Model_Resource_StaticBlockCollection();
        $collection = $staticBlockCollection->getStaticBlockCollection();

        $this->assertInstanceOf(
            Ambimax_StaticBlockScheduler_Model_Resource_StaticBlockCollection::class,
            $collection
        );
    }

    /**
     * @loadFixture ~Ambimax_StaticBlockScheduler/banner
     */
    public function testGetStaticBlockByBlockIdWithExistingId()
    {
        $staticBlockCollection = new Ambimax_StaticBlockScheduler_Model_Resource_StaticBlockCollection();
        $staticBlock = $staticBlockCollection->getStaticBlockByBlockId(1);

        $this->assertSame('1', $staticBlock->getId());
    }

    /**
     * @loadFixture ~Ambimax_StaticBlockScheduler/banner
     */
    public function testGetStaticBlockByBlockIdWithNonExistingId()
    {
        $staticBlockCollection = new Ambimax_StaticBlockScheduler_Model_Resource_StaticBlockCollection();
        $staticBlock = $staticBlockCollection->getStaticBlockByBlockId(999);

        $this->assertSame(null, $staticBlock);
    }

    /**
     * @loadFixture ~Ambimax_StaticBlockScheduler/banner
     */
    public function testGetStaticBlockByIdentifierWithExistingIdentifier()
    {
        $staticBlockCollection = new Ambimax_StaticBlockScheduler_Model_Resource_StaticBlockCollection();
        $staticBlock = $staticBlockCollection->getStaticBlockByIdentifier('forever');

        $this->assertSame('3', $staticBlock->getId());
    }

    /**
     * @loadFixture ~Ambimax_StaticBlockScheduler/banner
     */
    public function testGetStaticBlockByIdentifierWithNonExistingIdentifier()
    {
        $staticBlockCollection = new Ambimax_StaticBlockScheduler_Model_Resource_StaticBlockCollection();
        $staticBlock = $staticBlockCollection->getStaticBlockByIdentifier('this_is_an_invalid_identifier');

        $this->assertSame(null, $staticBlock);
    }
}
