<?php

class Tawfekov_CartTimeout_Model_Mysql4_Log extends Mage_Core_Model_Mysql4_Abstract {

    protected function _construct() {
        $this->_init("carttimeout/log", "id");
    }
}
