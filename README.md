Cart Timeout ( V 0.1.0 )
============

** The Goal ** 

adds a custom timeout for Magento cart. 

![alt text](https://github.com/tawfekov/Cart_Timeout/raw/master/preview/preview.png" Preview")


***What is this ? ***

this is a magento module can be used to add custom life time for the customer's cart, so no customer can block the items from other client by adding them to his cart .

*** Why I did it ? ***

by default magento came with default configuation with a days timeout to see go to :

`system > configuation > sales > checkout` in the tab : `shopping cart`

you'll had a field called : ` Quote Lifetime (days)` and the minimum value of it is `1` day


*** Installation :***

Simply copy the `app` directory and place on you magento installtion folder . 



*** How to use it ?? ***

this module simply creates a block that can be placed every where you want in your theme , I like to put it on top of the website , yes every page of the website , so the customer can follow up his cart timeout.





```php
<?php echo $this->getLayout()->createBlock('carttimeout/timer')
                             ->setBlockId('carttimeout')
                             ->setTemplate("carttimeout/timer.phtml")
                             ->toHtml(); ?>
```

Feel free to put this code when you like.


That simple :) 



*** What would happened if the cart timed out ? ***

the following :
 - the `quote` object of that cart would be disbaled in the table `sales_flat_quote` : `is_active` will be `0` .
 - all the quntity of the items in that cart will be sent back to the `inventory` of magento .
 - a log will be saved into `cart_timeout_quote_log` table for historical reason , these information can for analytical reports.
 - next time the user will refesh the page , he/she won't see items in thier cart ( I will make sure to do some improvments here , trying to be more poilte with the customers ).
 - default magento reports won't be affected by this module , becuase I am doing it exaclty the way magento do with it with its funcionalty 



*** Configuation ***

this is very fist version of this module , the default value for it is `15` minutes , I'll imporve it in next version to be configured from magento `adminhtml` .

but for now you need to edit these classes : 
- `Tawfekov_CartTimeout_Block_Timer` : `$custom_lifetime`
- `Tawfekov_CartTimeout_Model_Cron` : `$custom_lifetime`

*** requirments ***

it only require `Magebnto Cron` to run , I adivse you to use `Aoe_Scheduler` module becuase it will let you see a timeline for your crons   


*** License :  ***

This module is licensed under `MIT`License , which means its completey free to use . 

*** Support :***

I will be happy to support this module under time avliablity.