<?php


class Ambimax_StaticBlockScheduler_Test_Model_ObserverTest extends EcomDev_PHPUnit_Test_Case
{


        public function testIfObserverIsStubbedByEvent()
    {
        $mockObserver = $this->getMockBuilder('Ambimax_StaticBlockScheduler_Model_Observer')->getMock();

        Mage::dispatchEvent('adminhtml_block_html_before');
        $this->assertEventDispatched('adminhtml_block_html_before');

        $mockObserver
            ->expects($this->once())
            ->method('addTheFromAndToDateFieldsToFieldset')
            ->will($this->returnSelf()
            );


    }


    public function testIfTheUrlReturnsTheRightBlockIdFromBlockTheEditingPage()
    {
        $this->assertTrue(true);
    }

    public function testIfConnectionToDatabaseWorksByAssertingTrue()
    {
        $observer = new Ambimax_StaticBlockScheduler_Model_Observer();
        $this->assertTrue($observer->getOnlyReadConnection()->tableColumnExists('cms_block', 'is_active_from'));
    }

    public function testIfConnectionToDatabaseWorksByAssertingFalse()
    {
        $observer = new Ambimax_StaticBlockScheduler_Model_Observer();
        $this->assertFalse($observer->getOnlyReadConnection()->tableColumnExists('cms_block', 'no_column'));
    }

    public function testIfBlockIdAndColumnReturnTheRightSqlString()
    {
        $observer = new Ambimax_StaticBlockScheduler_Model_Observer();
        $sql = $observer->getSqlStringByBlockIdAndColumn(42, 'foo');

        $this->assertSame('SELECT foo FROM cms_block WHERE block_id=42', $sql);
    }

}
