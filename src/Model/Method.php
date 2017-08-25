<?php
/**
 * Acaldeira_SimplePay
 *
 * @category    Acaldeira
 * @package     Acaldeira_Strope
 * @copyright   Copyright (c) 2017 Acaldeira. (http://www.acaldeira.com.br)
 */

namespace Acaldeira\SimplePay\Model;

use \Magento\Quote\Api\Data\PaymentInterface;
use \Magento\Quote\Api\Data\CartInterface;
use \Magento\Framework\DataObject;


class Method extends \Magento\Payment\Model\Method\AbstractMethod
{
    const PAYMENT_METHOD_SIMPLEPAY_CODE = 'simplepay';

    /**
     * Payment method code
     *
     * @var string
     */
    protected $_code = self::PAYMENT_METHOD_SIMPLEPAY_CODE;

    /**
     * @var string
     */
    protected $_infoBlockType = 'Acaldeira\SimplePay\Block\Info\SimplePay';

    /**
     * Availability option
     *
     * @var bool
     */
    protected $_isOffline = true;

    /**
     * Assign data to info model instance
     *
     * @param \Magento\Framework\DataObject|mixed $data
     * @return $this
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function assignData(DataObject $data)
    {

        parent::assignData($data);
        $additionalData = $data->getData(PaymentInterface::KEY_ADDITIONAL_DATA);

        $this->logger->debug($additionalData, null, true);
        if (
            !is_array($additionalData)
        ) {
            return $this;
        }

        $this->getInfoInstance()
            ->setAdditionalInformation(
                'notes',
                $additionalData['notes']
            );

        return $this;
    }

    /**
     * Check whether payment method can be used
     *
     * @param \Magento\Quote\Api\Data\CartInterface|null $quote
     * @return bool
     */
    public function isAvailable(CartInterface $quote = null)
    {
        if (!$this->isActive($quote ? $quote->getStoreId() : null)) {
            return false;
        }

        return true;
    }

}