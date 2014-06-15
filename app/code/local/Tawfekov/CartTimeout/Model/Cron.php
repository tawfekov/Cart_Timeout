<?php

class Tawfekov_CartTimeout_Model_Cron {
    public function clear() {
        // TODO: the cart timeout is set static to be 15M , in next updates I'll make via configuation 
        $custom_lifetime = 15; 
        // extending memory limit
        ini_set("memory_limit", "2000M");
        $now = new \DateTime("now");
        $now->sub(new DateInterval("P0DT0H{$custom_lifetime}M0S"));
        $lifetimes = Mage::getConfig()->getStoresConfigByPath('checkout/cart/delete_quote_after');
        foreach ($lifetimes as $storeId => $lifetime) {
            $quotes = Mage::getModel('sales/quote')->getCollection();
            /* @var $quotes Mage_Sales_Model_Mysql4_Quote_Collection */
            $quotes->addFieldToFilter('store_id', $storeId);
            $quotes->addFieldToFilter('updated_at', array('to' => $now->format("Y-m-d H:i:s")));
            $quotes->addFieldToFilter('is_active', 1);
            $collection = $quotes->load();
            foreach ($collection as $quote ){
                $now = new \DateTime("now");
                $log = Mage::getModel("carttimer/log");
                $log->setData("created_at",$now->format("Y-m-d H:i:s"));
                $log->setData("quote_id" , $quote->getId());
                $log->setData("store_id",$storeId);
                $log->save();
                $quote->setData("is_active" , 0 );
                $quote->save();
                unset($log);
                unset($quote);
            }
        }
        return true;
    }
}
