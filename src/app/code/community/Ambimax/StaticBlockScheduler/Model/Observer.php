<?php
/**
 * Created by PhpStorm.
 * User: wysselbie
 * Date: 14.02.18
 * Time: 11:56
 */

class Ambimax_StaticBlockScheduler_Model_Observer extends Mage_Core_Model_Observer
{

    /**
     * Adds two fields to the edit form of a static block
     * so its displaying can be managed by dates (from and to date)
     *
     * @param Varien_Event_Observer $observer
     */
    public function addTheFromAndToDateFieldsToFieldset(Varien_Event_Observer $observer)
    {
        /** @var Mage_Adminhtml_Block_Cms_Block_Edit_Form $block */
        $block = $observer->getBlock();

        if ($block instanceof Mage_Adminhtml_Block_Cms_Block_Edit_Form) {

            /** @var Varien_Data_Form $form */
            $form = $block->getForm();

            /**
             * The fieldset where to put the two new fields in
             * @var Varien_Data_Form_Element_Fieldset $fieldset
             */
            $fieldset = $form->getElement('base_fieldset');


            /**
             * Database connection to get the current values of 'is_active_from'
             * and 'is_active_to'
             * @var Varien_Db_Adapter_Interface $connection
             */
            $connection = $this->getOnlyReadConnection();

            /**
             * @var string $blockId
             */
            $blockId = $this->getCurrentBlockIdFromUrl();

            /**
             * Query to select the 'is_active_from' value
             * @var string $sql
             */
            $sql = $this->getSqlStringByBlockIdAndColumn($blockId, 'is_active_from');

            /**
             * Contains the 'is_active_from' date
             * @var string $isActiveFrom
             */
            $isActiveFrom = $connection->fetchOne($sql);

            /**
             * Query to select the 'is_active_to' value
             * @var string $sql
             */
            $sql = $this->getSqlStringByBlockIdAndColumn($blockId, 'is_active_to');

            /**
             * Contains the 'is_active_to' date
             * @var string $isActiveTo
             */
            $isActiveTo = $connection->fetchOne($sql);

            /**
             * Date format of current location (e. g. 'dd.MM.yyyy')
             * @var string $dateFormat
             */
            $dateFormat = Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);


            /**
             * Now adding the two fields with all the
             * informations from above that are needed
             */
            $fieldset->addField('is_active_from', 'date', array(
                'label' => $block->__('Is active from'),
                'title' => $block->__('Is active from'),
                'value' => $isActiveFrom,
                'name' => 'is_active_from',
                'image' => $block->getSkinUrl('images/grid-cal.gif'),
                'format' => $dateFormat
            ));
            $fieldset->addField('is_active_to', 'date', array(
                'label' => $block->__('Is active to'),
                'title' => $block->__('Is active to'),
                'value' => $isActiveTo,
                'name' => 'is_active_to',
                'image' => $block->getSkinUrl('images/grid-cal.gif'),
                'format' => $dateFormat
            ));

        }
        return $this;
    }

    /**
     * Adds two columns to the static block grid
     * so 'is_active_from' and 'is_active_to' are displayed
     *
     * @param Varien_Event_Observer $observer
     */
    public function addTheTwoColumnsToTheStaticBlocksGrid($observer)
    {

        /** @var Mage_Adminhtml_Block_Cms_Block_Grid $grid */
        $grid = $observer->getBlock();


        /**
         * Adding the two columns, if you are on the static block page
         */
        if ($grid instanceof Mage_Adminhtml_Block_Cms_Block_Grid) {

            $grid->addColumn('is_active_from',
                array(
                    'header' => $grid->__('Is active from'),
                    'index' => 'is_active_from',
                    'type' => 'date')
            );

            $grid->addColumn('is_active_to',
                array(
                    'header' => $grid->__('Is active to'),
                    'index' => 'is_active_to',
                    'type' => 'date')
            );
        }
    }

    public function checkIfShallBeDisplayed($observer)
    {
        $block = $observer->getBlock();


        if ($block instanceof Ambimax_StaticBlockScheduler_Block_StaticBlock) {

            //TODO setData(getData);

//            $blockId = $block->getData('block_id');
//
//            $collection = Mage::getResourceModel('ambimax_staticblockscheduler/staticBlockCollection');
//            /** @var Ambimax_StaticBlockScheduler_Block_StaticBlock $ambimaxBlock */
//            $ambimaxBlock = $collection->getStaticBlockByBlockId($blockId);
//
//
//            if ($ambimaxBlock->isCurrentlyActive()) {
//                return $this;
//            } else {
//                return $this;
//            }
        }
        return $this;
    }


    /**
     * To determine which static block is edited in that moment
     * @return mixed
     */
    public function getCurrentBlockIdFromUrl()
    {
        return Mage::app()->getRequest()->getParam('block_id');
    }

    /**
     * @return Varien_Db_Adapter_Interface
     */
    public function getOnlyReadConnection()
    {
        return Mage::getSingleton('core/resource')->getConnection('read');
    }

    /**
     * generates a select-query to get the value of a static block
     * by using its $blockId and $column
     * @param $blockId
     * @param $column
     * @return string
     */
    public function getSqlStringByBlockIdAndColumn($blockId, $column)
    {
        return 'SELECT ' . $column . ' FROM cms_block WHERE block_id=' . $blockId;
    }
}