<?php


class Ambimax_StaticBlockScheduler_Block_StaticBlock extends Mage_Cms_Block_Widget_Block
{

    public function hasValidTimeFrame()
    {
        $dateTimeFrom = DateTime::createFromFormat("Y-m-d", $this->getData('is_active_from'));
        $dateTimeTo = DateTime::createFromFormat("Y-m-d", $this->getData('is_active_to'));

        return $dateTimeTo > $dateTimeFrom;

    }

    public function isInTimeFrame()
    {
        $dateTimeFrom = DateTime::createFromFormat("Y-m-d", $this->getData('is_active_from'));
        $dateTimeTo = DateTime::createFromFormat("Y-m-d", $this->getData('is_active_to'));
        $dateTimeNow = new DateTime();

        return $dateTimeFrom <= $dateTimeNow && $dateTimeNow <= $dateTimeTo;
    }

    public function isCurrentlyActive()
    {
        return $this->hasValidTimeFrame() && $this->isInTimeFrame();
    }


//    protected function _toHtml()
//    {
//        $isInTimeFrame = $this->isInTimeFrame();
//        $hasValidTimeFrame = $this->hasValidTimeFrame();
//        $isActive = $this->isCurrentlyActive();
//
//        $blockId = $this->getData('block_id');
//
//        echo $blockId;
//
//        echo var_dump($hasValidTimeFrame) .  var_dump($isInTimeFrame) . var_dump($isActive) . '</br>-----after----</br>';
//
//        if ((bool)$isActive) {
//            return 'TEST';
//        } else {
//            return '';
//        }
//    }
}