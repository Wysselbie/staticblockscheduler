<?php
/**
 * Created by PhpStorm.
 * User: wysselbie
 * Date: 14.02.18
 * Time: 11:56
 */

class Ambimax_StaticBlockScheduler_Model_Observer
{
    /**
     * @param Varien_Event_Observer $observer
     */
    public function showSomething(Varien_Event_Observer $observer)
    {
        $fileDescriptor = fopen('blah.txt', 'a');
        fwrite($fileDescriptor, "\n" . date('d.m.Y H:i:s', time()));
    }
}