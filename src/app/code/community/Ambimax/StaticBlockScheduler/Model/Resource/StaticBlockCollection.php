<?php
/**
 * Created by PhpStorm.
 * User: jb
 * Date: 22.12.17
 * Time: 10:12
 */

class Ambimax_StaticBlockScheduler_Model_Resource_StaticBlockCollection extends Mage_Cms_Model_Resource_Block_Collection
{
    protected function _construct()
    {
        $this->_init('ambimax_staticblockscheduler/staticBlock');
        $this->_map['fields']['store'] = 'store_table.store.id';
    }

    /**
     * @return Ambimax_StaticBlockScheduler_Model_Resource_StaticBlockCollection|Object
     */
    public function getStaticBlockCollection()
    {
        return Mage::getResourceModel(
            'ambimax_staticblockscheduler/staticBlockCollection'
        );
    }

    /**
     * @param $block_id
     * @return Varien_Object
     */
    public function getStaticBlockByBlockId($block_id)
    {
        return $this->getItemById($block_id);
    }

    /**
     * @param $identifier
     * @return Varien_Object
     */
    public function getStaticBlockByIdentifier($identifier)
    {
        return $this->getItemByColumnValue('identifier', $identifier);
    }
}