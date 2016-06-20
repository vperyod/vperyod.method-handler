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
 * @category  Trait
 * @package   Vperyod\MethodHandler
 * @author    Jake Johns <jake@jakejohns.net>
 * @copyright 2016 Jake Johns
 * @license   http://jnj.mit-license.org/2016 MIT License
 * @link      http://github.com/vperyod/vperyod.method-handler
 */

namespace Vperyod\MethodHandler;

/**
 * Method Override Trait
 *
 * @category Trait
 * @package  Vperyod\MethodHandler
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/ MIT License
 * @link     http://github.com/vperyod/vperyod.method-handler
 */
trait MethodOverrideTrait
{
    /**
     * Method Override Param
     *
     * @var string
     *
     * @access protected
     */
    protected $methodOverrideParam = '__method_override';

    /**
     * Method Override Header
     *
     * @var string
     *
     * @access protected
     */
    protected $methodOverrideHeader = 'X-Http-Method-Override';

    /**
     * Get Method Override Param
     *
     * @return string
     *
     * @access public
     */
    public function getMethodOverrideParam()
    {
        return $this->methodOverrideParam;
    }

    /**
     * Set Method Override Param
     *
     * @param string $param request body parameter which overrides the method
     *
     * @return string
     *
     * @access public
     */
    public function setMethodOverrideParam($param)
    {
        $this->methodOverrideParam = $param;
        return $this;
    }

    /**
     * Get Method Override Header
     *
     * @return string
     *
     * @access public
     */
    public function getMethodOverrideHeader()
    {
        return $this->methodOverrideHeader;
    }

    /**
     * Get Method Override Header
     *
     * @param string $header request header which overrides the method
     *
     * @return $this
     *
     * @access public
     */
    public function setMethodOverrideHeader($header)
    {
        $this->methodOverrideHeader = $header;
        return $this;
    }
}
