define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';

        rendererList.push(
            {
                type: 'simplepay',
                component: 'Acaldeira_SimplePay/js/view/payment/method-renderer/simplepay-method'
            }
        );

        return Component.extend({});
    }
);