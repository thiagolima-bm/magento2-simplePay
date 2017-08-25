<?php
/**
 * Acaldeira_SimplePay
 *
 * @category    Acaldeira
 * @package     Acaldeira_Strope
 * @copyright   Copyright (c) 2017 Acaldeira. (http://www.acaldeira.com.br)
 */

namespace Acaldeira\SimplePay\Block\Info;

class SimplePay extends \Magento\Payment\Block\Info
{
    /**
     * @var string
     */
    protected $_notes;

    /**
     * @var string
     */
    protected $_template = 'Acaldeira_SimplePay::info/simplepay.phtml';

    /**
     * @return mixed
     */
    public function getNotes()
    {
        if ($this->_notes === null) {
            $this->_notes = $this->getInfo()->getAdditionalInformation('notes');
        }
        return $this->_notes;
    }

}