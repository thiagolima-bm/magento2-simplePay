define(
    [
        'jquery',
        'Magento_Checkout/js/view/payment/default'
    ],
    function (
        $,
        Component
    ) {
        'use strict';

        return Component.extend({
            defaults: {
                template: 'Acaldeira_SimplePay/payment/simplepay'
            },

            /**
             * Get payment method data
             */
            getData: function () {

                var additionalData = {};
                additionalData['notes'] = $('.simplePay-notes').val();
                return {
                    'method': this.item.method,
                    'po_number': null,
                    'additional_data': additionalData
                };
            },
        });
    }
);
