<?php
/**
 * Acaldeira_SimplePay
 *
 * @category    Acaldeira
 * @package     Acaldeira_Strope
 * @copyright   Copyright (c) 2017 Acaldeira. (http://www.acaldeira.com.br)
 */

namespace Acaldeira\SimplePay\Test\Unit\Model;

class MethodTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Acaldeira\SimplePay\Model\Method
     */
    protected $_object;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $_scopeConfig;

    public function testGetInfoBlockType()
    {
        $this->assertEquals('Acaldeira\SimplePay\Block\Info\SimplePay', $this->_object->getInfoBlockType());
    }

    public function testIsAvailable()
    {

        $stub = $this->getMock(
            'Acaldeira\SimplePay\Model\Method',
            ['isActive'],
            [],
            '',
            false
        );

        $stub->expects($this->any())
            ->method('isActive')
            ->will($this->returnValue(true));

        $this->assertTrue($stub->isAvailable());
    }

    protected function setUp()
    {
        $objectManagerHelper = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $eventManager = $this->getMock('Magento\Framework\Event\ManagerInterface', [], [], '', false);
        $paymentDataMock = $this->getMock('Magento\Payment\Helper\Data', [], [], '', false);
        $this->_scopeConfig = $this->getMock(
            'Magento\Framework\App\Config\ScopeConfigInterface',
            ['getValue', 'isSetFlag'],
            [],
            '',
            false
        );
        $this->_object = $objectManagerHelper->getObject(
            'Acaldeira\SimplePay\Model\Method',
            [
                'eventManager' => $eventManager,
                'paymentData' => $paymentDataMock,
                'scopeConfig' => $this->_scopeConfig,
            ]
        );
    }
}