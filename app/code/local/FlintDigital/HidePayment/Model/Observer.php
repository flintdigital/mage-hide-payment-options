<?php
class FlintDigital_HidePayment_Model_Observer
{

			public function paymentMethodIsActive(Varien_Event_Observer $observer)
			{
				  $instance = $observer->getMethodInstance();
        $result = $observer->getResult();
		$paymentMethodCode = explode(",",Mage::getStoreConfig('flint_payment/hide_method/method_code'));
		
        if (in_array($instance->getCode(),$paymentMethodCode)) {
            if (Mage::app()->getStore()->isAdmin()) {
                $result->isAvailable = true;
            } else {
                $result->isAvailable = false;
            }
        }
			}
		
}
