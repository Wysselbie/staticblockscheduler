<?php


class Ambimax_StaticBlockScheduler_Block_StaticBlock extends Mage_Cms_Block_Block
{

//    public function hasValidTimeFrame()
//    {
//        $dateTimeFrom = DateTime::createFromFormat("Y-m-d", $this->getData('is_active_from'));
//        $dateTimeTo = DateTime::createFromFormat("Y-m-d", $this->getData('is_active_to'));
//
//        return $dateTimeTo > $dateTimeFrom;
//
//    }
//
//    public function isInTimeFrame()
//    {
//        $dateTimeFrom = DateTime::createFromFormat("Y-m-d", $this->getData('is_active_from'));
//        $dateTimeTo = DateTime::createFromFormat("Y-m-d", $this->getData('is_active_to'));
//        $dateTimeNow = new DateTime();
//
//        return $dateTimeFrom <= $dateTimeNow && $dateTimeNow <= $dateTimeTo;
//    }
//
//    public function isCurrentlyActive()
//    {
//        return $this->hasValidTimeFrame() && $this->isInTimeFrame();
//    }

    protected function _toHtml()
    {
        $blockId = $this->getBlockId();
        $html = '';
        if ($blockId) {
            $block = Mage::getModel('ambimax_staticblockscheduler/staticBlock')
                ->setStoreId(Mage::app()->getStore()->getId())
                ->load($blockId);
            if ($block->isCurrentlyActive()) {
                /* @var $helper Mage_Cms_Helper_Data */
                $helper = Mage::helper('cms');
                $processor = $helper->getBlockTemplateProcessor();
                $html = $processor->filter($block->getContent());
                $this->addModelTags($block);
            }
        }
        return $html;
    }
}