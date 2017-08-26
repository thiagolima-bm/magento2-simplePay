## Acaldeira SimplePay

Magento 2 Acaldeira SimplePay Module

Description
-----------
This module is a skeleton for building a Magento 2 payment module. 
 
 At the checkout
 ![Checkout payment](https://image.prntscr.com/image/RCt4PwPrRb2Vyo2tmVY51A.png "Checkout payment")

At the admin panel
 ![Admin order Result](https://image.prntscr.com/image/hwBU4JQLQbejS0vVpuCw9A.png "Admin order result")
 
Compatibility
-------------
- Magento >= 2.0

This library aims to support and is tested against the following PHP
implementations:

* PHP 7.0

Installation Instructions
-------------------------
Install using composer by adding to your composer file using commands:

1. create a folder at magento's root folder called "acmodules"
2. extract the extension inside the folder "acmodules/simplePay"
3. update Magento's composer.json file with the following
 
    2.1 add require 
    
        "acaldeira/simplePay": "*"
    
    2.2 add repositories 
    
        {
            "type": "path",
            "url": "acmodules/simplePay"
        }
    
4. composer update
5. bin/magento setup:upgrade

Support
-------

Credits
---------

Contribution
------------
Any contribution is highly appreciated. The best way to contribute code is to open a [pull request on GitHub](https://help.github.com/articles/using-pull-requests).

License
-------
Respect the [Magento][] OSL license, which is included in this codebase.

[magento]: Magento2_LICENSE.md

Copyright
---------
Copyright (c) 2017 Acaldeira.