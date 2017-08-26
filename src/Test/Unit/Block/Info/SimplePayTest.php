<?php
/**
 * Acaldeira_SimplePay
 *
 * @category    Acaldeira
 * @package     Acaldeira_Strope
 * @copyright   Copyright (c) 2017 Acaldeira. (http://www.acaldeira.com.br)
 */

namespace Acaldeira\SimplePay\Test\Unit\Block\Info;

use \Magento\Framework\View\Element\Template\Context;
use Acaldeira\SimplePay\Block\Info\SimplePay;
use \Magento\Payment\Model\Info;
use \PHPUnit_Framework_MockObject_MockObject as MockObject;

class SimplePayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Info|MockObject
     */
    private $info;

    /**
     * @var SimplePay
     */
    private $block;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        $context = $this->getMockBuilder(Context::class)
            ->disableOriginalConstructor()
            ->setMethods([])
            ->getMock();

        $this->info = $this->getMockBuilder(Info::class)
            ->disableOriginalConstructor()
            ->setMethods(['getAdditionalInformation'])
            ->getMock();

        $this->block = new SimplePay($context);
    }

    /**
     * @covers \Acaldeira\SimplePay\Block\Info\SimplePay::getNotes
     * @param array $details
     * @param string|null $expected
     * @dataProvider getNotesToDataProvider
     */
    public function testGetNotes($details, $expected)
    {
        $this->info->expects(static::at(0))
            ->method('getAdditionalInformation')
            ->with('notes')
            ->willReturn($details);
        $this->block->setData('info', $this->info);

        static::assertEquals($expected, $this->block->getNotes());
    }

    /**
     * Get list of variations for notes configuration option testing
     * @return array
     */
    public function getNotesToDataProvider()
    {
        return [
            ['notes' => 'I would like to pay in bananas', 'I would like to pay in bananas'],
            ['', null]
        ];
    }
}