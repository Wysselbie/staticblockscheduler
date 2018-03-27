<?php


class Ambimax_StaticBlockScheduler_Test_Model_StaticBlockTest extends PHPUnit_Framework_TestCase
{

    /**
     * @loadFixture ~Ambimax_StaticBlockScheduler/banner
     */
    public function testActiveBlock()
    {
        $block = Mage::getModel('ambimax_staticblockscheduler/staticBlock')->load(1);
        $this->assertTrue((boolean)$block->getIsActive());
    }

    /**
     * @loadFixture ~Ambimax_StaticBlockScheduler/banner
     */
    public function testInactiveBlock()
    {
        $block = Mage::getModel('ambimax_staticblockscheduler/staticBlock')->load(2);
        $this->assertFalse((boolean)$block->getIsActive());
    }

    /**
     * @loadFixture ~Ambimax_StaticBlockScheduler/banner
     */
    public function testGetIsActiveFrom()
    {
        $block = Mage::getModel('ambimax_staticblockscheduler/staticBlock')->load(1);

        $this->assertSame('2017-12-01', $block->getData('is_active_from'));
    }

    /**
     * @loadFixture ~Ambimax_StaticBlockScheduler/banner
     */
    public function testGetIsActiveTo()
    {
        $block = Mage::getModel('ambimax_staticblockscheduler/staticBlock')->load(1);

        $this->assertSame('2017-12-26', $block->getData('is_active_to'));
    }

    /**
     * @loadFixture ~Ambimax_StaticBlockScheduler/banner
     */
    public function testSetIsActiveFrom()
    {
        $block = Mage::getModel('ambimax_staticblockscheduler/staticBlock')->load(1);
        $block->setData('is_active_from', '1993-10-28 08:13:00');

        $this->assertSame('1993-10-28 08:13:00', $block->getData('is_active_from'));

    }

    /**
     * @loadFixture ~Ambimax_StaticBlockScheduler/banner
     */
    public function testSetIsActiveTo()
    {
        $block = Mage::getModel('ambimax_staticblockscheduler/staticBlock')->load(1);
        $block->setData('is_active_to', '2093-10-28 08:13:00');

        $this->assertSame('2093-10-28 08:13:00', $block->getData('is_active_to'));

    }

    /**
     * @loadFixture ~Ambimax_StaticBlockScheduler/banner
     */
    public function testIfBlockHasValidTimeFrame()
    {
        $block = Mage::getModel('ambimax_staticblockscheduler/staticBlock')->load(1);
        $this->assertTrue($block->hasValidTimeFrame());
    }

    /**
     * @loadFixture ~Ambimax_StaticBlockScheduler/banner
     */
    public function testIfBlockHasInvalidTimeFrame()
    {
        $block = Mage::getModel('ambimax_staticblockscheduler/staticBlock')->load(4);
        $this->assertFalse($block->hasValidTimeFrame());
    }

    /**
     * @loadFixture ~Ambimax_StaticBlockScheduler/banner
     */
    public function testIfBlockIsInTimeFrameExpectingTrue()
    {
        $block = Mage::getModel('ambimax_staticblockscheduler/staticBlock')->load(3);
        $this->assertTrue($block->isInTimeFrame());
    }

    /**
     * @loadFixture ~Ambimax_StaticBlockScheduler/banner
     */
    public function testIfBlockIsInTimeFrameExpectingFalse()
    {
        $block = Mage::getModel('ambimax_staticblockscheduler/staticBlock')->load(1);
        $this->assertFalse($block->isInTimeFrame());
    }

    /**
     * @loadFixture ~Ambimax_StaticBlockScheduler/banner
     */
    public function testIfBlockIsCurrentlyActiveExpectingTrue()
    {
        $block = Mage::getModel('ambimax_staticblockscheduler/staticBlock')->load(3);
        $this->assertTrue($block->isCurrentlyActive());
    }

    /**
     * @loadFixture ~Ambimax_StaticBlockScheduler/banner
     */
    public function testIfBlockIsCurrentlyActiveExpectingFalse()
    {
        $block = Mage::getModel('ambimax_staticblockscheduler/staticBlock')->load(1);
        $this->assertFalse($block->isCurrentlyActive());
    }

//    public function testSomethingHappensWithBlock()
//    {
//        /** @var  Ambimax_StaticBlockScheduler_Model_StaticBlock $block */
//        $block = Mage::getModel('ambimax_staticblockscheduler/staticBlock')->load(1);
//
//    }

}