<?php
/**
 * Vperyod Method Override Handler
 *
 * PHP version 5
 *
 * Copyright (C) 2016 Jake Johns
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 *
 * @category  Middleware
 * @package   Vperyod\MethodHandler
 * @author    Jake Johns <jake@jakejohns.net>
 * @copyright 2016 Jake Johns
 * @license   http://jnj.mit-license.org/2016 MIT License
 * @link      http://github.com/vperyod/vperyod.method-handler
 */

namespace Vperyod\MethodHandler;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * MethodHandler
 *
 * Parses request body and request headers and overrides request method for
 * allowed request types
 *
 * @category Middleware
 * @package  Vperyod\MethodHandler
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/ MIT License
 * @link     http://github.com/vperyod/vperyod.method-handler
 */
class MethodHandler
{
    use MethodOverrideTrait;

    /**
     * __invoke
     *
     * @param Request  $request  PSR7 HTTP Request
     * @param Response $response PSR7 HTTP Response
     * @param callable $next     Next callable middleware
     *
     * @return Response
     *
     * @access public
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        if (! $this->isOverridable($request)
            || ! $method = $this->getMethod($request)
        ) {
            return $next($request, $response);
        }

        $request = $request->withMethod($method);
        return $next($request, $response);
    }

    /**
     * Is Request Overidable?
     *
     * Method is considered overrideable if it is a post request
     *
     * @param Request $request PSR7 HTTP Request
     *
     * @return bool
     *
     * @access protected
     */
    protected function isOverridable(Request $request)
    {
        return 'POST' === $request->getMethod();
    }

    /**
     * Get value with which to override method
     *
     * @param Request $request PSR7 HTTP Request
     *
     * @return null | $string
     *
     * @access protected
     */
    protected function getMethod(Request $request)
    {
        $param = $this->getMethodOverrideParam();
        $params = $request->getParsedBody();

        if (isset($params[$param])) {
            return $params[$param];
        }

        $header = $this->getMethodOverrideHeader();
        if ($method = $request->getHeaderLine($header)) {
            return $method;
        }
    }
}
