<?php
// @codingStandardsIgnoreFile

namespace Vperyod\MethodHandler;

use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequestFactory;

class MethodHandlerTest extends \PHPUnit_Framework_TestCase
{
    public function testHandler()
    {
        $handler = new MethodHandler();

        $handler(
            ServerRequestFactory::fromGlobals()
                ->withMethod('POST')
                ->withParsedBody(['__method_override' => 'PUT']),
            new Response(),
            [$this, 'checkRequest']
        );
    }

    public function testCustomParam()
    {
        $handler = new MethodHandler();
        $handler->setMethodOverrideParam('foo');

        $handler(
            ServerRequestFactory::fromGlobals()
                ->withMethod('POST')
                ->withParsedBody(['foo' => 'PUT']),
            new Response(),
            [$this, 'checkRequest']
        );
    }

    public function testNotOverrideable()
    {
        $handler = new MethodHandler();
        $handler(
            ServerRequestFactory::fromGlobals()
                ->withMethod('PUT')
                ->withParsedBody(['__method_override' => 'foo']),
            new Response(),
            [$this, 'checkRequest']
        );
    }

    public function testHeader()
    {
        $handler = new MethodHandler();
        $handler(
            ServerRequestFactory::fromGlobals()
                ->withMethod('POST')
                ->withHeader('X-Http-Method-Override','PUT'),
            new Response(),
            [$this, 'checkRequest']
        );
    }

    public function testCustomHeader()
    {
        $handler = new MethodHandler();
        $handler->setMethodOverrideHeader('foo');
        $handler(
            ServerRequestFactory::fromGlobals()
                ->withMethod('POST')
                ->withHeader('foo','PUT'),
            new Response(),
            [$this, 'checkRequest']
        );
    }

    public function testNoOverride()
    {
        $test = $this;
        $handler = new MethodHandler();
        $handler(
            ServerRequestFactory::fromGlobals()->withMethod('POST'),
            new Response(),
            function ($request) use ($test) {
                $test->assertSame(
                    'POST',
                    $request->getMethod()
                );
            }
        );
    }


    public function checkRequest($request, $response)
    {
        $this->assertSame(
            'PUT',
            $request->getMethod()
        );

        return $response;
    }
}

