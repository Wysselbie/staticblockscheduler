<?php
/**
 * Created by PhpStorm.
 * User: jb
 * Date: 22.12.17
 * Time: 11:43
 */

class Ambimax_StaticBlockScheduler_Model_StaticBlock extends Mage_Cms_Model_Block
{
    protected function _construct()
    {
        $this->_init('ambimax_staticblockscheduler/staticBlock');
    }

    public function hasValidTimeFrame()
    {
        $dateTimeFrom = DateTime::createFromFormat("Y-m-d H:i:s", $this->getData('is_active_from'));
        $dateTimeTo = DateTime::createFromFormat("Y-m-d H:i:s", $this->getData('is_active_to'));

        return $dateTimeTo > $dateTimeFrom;

    }

    public function isInTimeFrame()
    {
        $dateTimeFrom = DateTime::createFromFormat("Y-m-d H:i:s", $this->getData('is_active_from'));
        $dateTimeTo = DateTime::createFromFormat("Y-m-d H:i:s", $this->getData('is_active_to'));
        $dateTimeNow = new DateTime("now");

        return $dateTimeFrom <= $dateTimeNow && $dateTimeNow <= $dateTimeTo;
    }

    public function isCurrentlyActive()
    {
        return $this->hasValidTimeFrame() && $this->isInTimeFrame();
    }

}