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

        //Always available on admin. In frontend is available if not set to be hidden in the config.
        if($paymentCodesToHide) {
            $result->isAvailable = Mage::app()->getStore()->isAdmin() || !in_array($instance->getCode(), $paymentCodesToHide);
        }
    }

}
