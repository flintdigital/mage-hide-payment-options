# Magento Hide Payment Options on Frontend
## Overview
Magento module that allows payment options to be hidden on the front-end checkout but can still be used for admin orders. Ideal for check/money order. I created this simple module as we have instances where some magento sites require the access to certain payment methods when placing admin orders but not on the website. A typical example is for wholesale orders or for walk-ins where orders are all placed through magento. 

### Installation instructions

Install with [modgit](https://github.com/jreinke/modgit):

    $ cd /path/to/magento
    $ modgit init
    $ modgit add mage-mod-hide-payment-options-fd git@github.com:flintdigital/mage-mod-hide-payment-options-fd.git

or download package manually [here](https://github.com/flintdigital/mage-hide-payment-options/archive/master.zip) and unzip in Magento root folder.
* If you are logged in log out and then log back in. 
* Finally, clear cache.

### Usage Instructions
* Go System->Config->Flint Extensions->Payment Override Options -> Hide Payment on Frontend
* Enter the payment code for each item that you wish to hide on the frontend as a comma seperated list; e.g. `checkmo,purchaseorder,authorizenet`
* Click Save Config

[Screen shot: Magento Hide Frontend Attributes Configuration](https://www.evernote.com/shard/s484/sh/c555e90e-1bea-45ae-95bc-19cff211b8f6/f667f3945b4c4b6a7b4a8e84966e2187)
