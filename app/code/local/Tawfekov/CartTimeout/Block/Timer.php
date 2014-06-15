<?php

class Tawfekov_CartTimeout_Block_Timer extends Mage_Core_Block_Template {
    
    protected $quote = null;
    public function getExpiryTime(){
        // check if the user has any items 
        $quote = $this->quote;
        if($quote){
            // TODO: the cart timeout is set static to be 15M , in next updates I'll make via configuation 
            $custom_lifetime = "15";
            $timezone = Mage::getStoreConfig(Mage_Core_Model_Locale::XML_PATH_DEFAULT_TIMEZONE);;
            $update_at = new \DateTime($quote->getData("updated_at"));
            $update_at->setTimezone(new  \DateTimeZone($timezone));
            $interval = new \DateInterval("P0DT0H{$custom_lifetime}M0S");
            $expiry = $update_at->add($interval);
            return $expiry;
        }
    }
    
    public function hasItems(){
        // check if the user has any items 
        $session = Mage::getModel('checkout/session');
        $this->quote = $session->getQuote();
        $items = $this->quote->getAllVisibleItems();
        if(count($items) > 0 ){
            return true;
        }
        return false;
    }

    public function setTemplate()
    {
        $this->setTemplate();
    }
}