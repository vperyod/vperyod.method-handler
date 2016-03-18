<?php
// @codingStandardsIgnoreFile

namespace Vperyod\MethodHandler;

class MethodOverrideHelperTest extends \PHPUnit_Framework_TestCase
{
    protected $helper;

    public function setUp()
    {
        $this->helper = new MethodOverrideHelper;
    }


    public function testInvoke()
    {
        $this->assertSame(
            $this->helper,
            $this->helper->__invoke('PUT')
        );

        $this->assertSame(
            'PUT',
            $this->helper->getMethod()
        );
    }

    public function testParams()
    {
        $expect = [
            'type' => 'hidden',
            'name' => '__method_override',
            'value' => 'PUT'
        ];

        $this->assertSame(
            $this->helper,
            $this->helper->setMethod('PUT')
        );

        $this->assertSame(
            $expect,
            $this->helper->getFormParams()
        );
    }

    public function testString()
    {
        $expect = '<input type="hidden" name="__method_override" value="PUT" />';

        $this->assertSame(
            $this->helper,
            $this->helper->setMethod('PUT')
        );

        $this->assertSame(
            $expect,
            (string) $this->helper
        );
    }

    public function testEmptyString()
    {
        $expect = '';

        $this->assertSame(
            $expect,
            (string) $this->helper
        );
    }
}

