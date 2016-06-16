<?php
class FlintDigital_HidePayment_Model_Observer
{

    public function paymentMethodIsActive(Varien_Event_Observer $observer)
    {
        $instance = $observer->getMethodInstance();
        $result = $observer->getResult();
        $paymentCodesToHide = explode(",", Mage::getStoreConfig('payment/fdpaymentoverride/method_code'));

        //Always available on admin. In frontend is available if not set to be hidden in the config.
        $result->isAvailable = Mage::app()->getStore()->isAdmin() || !in_array($instance->getCode(), $paymentCodesToHide);
    }

}
