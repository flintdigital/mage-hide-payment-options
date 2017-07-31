<?php
class FlintDigital_HidePayment_Model_Observer
{

    public function paymentMethodIsActive(Varien_Event_Observer $observer)
    {
        $paymentCodesToHide = explode(",", Mage::getStoreConfig('payment/fdpaymentoverride/method_code'));
        //For some reason sometimes it gets an empty element
        if(!empty($paymentCodesToHide) && $paymentCodesToHide[0] == '')
            unset($paymentCodesToHide[0]);

        $instance = $observer->getMethodInstance();
        $result = $observer->getResult();

        //Preserve original value of $result->isAvailable, however set to false
	// if in frontend and code is in array
	if($paymentCodesToHide) {
	    if  (!Mage::app()->getStore()->isAdmin() && in_array($instance->getCode(), $paymentCodesToHide) ) {
	    		$result->isAvailable = false;
            }
        }
    }

}
