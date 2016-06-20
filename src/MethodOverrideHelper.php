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
 * @category  ViewHelper
 * @package   Vperyod\MethodHandler
 * @author    Jake Johns <jake@jakejohns.net>
 * @copyright 2016 Jake Johns
 * @license   http://jnj.mit-license.org/2016 MIT License
 * @link      http://github.com/vperyod/vperyod.method-handler
 */

namespace Vperyod\MethodHandler;

/**
 * Method Override Helper
 *
 * Simple view helper to assist in creating a hidden form field to override the
 * method of the post request
 *
 * @category ViewHelper
 * @package  Vperyod\MethodHandler
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/ MIT License
 * @link     http://github.com/vperyod/vperyod.method-handler
 */
class MethodOverrideHelper
{
    use MethodOverrideTrait;

    /**
     * Value with which to override method
     *
     * @var string
     *
     * @access protected
     */
    protected $method;

    /**
     * __invoke
     *
     * @param string $method value to overide method
     *
     * @return $this
     *
     * @access public
     */
    public function __invoke($method = null)
    {
        if ($method) {
            $this->setMethod($method);
        }
        return $this;
    }

    /**
     * Set Method
     *
     * @param string $method value to override method
     *
     * @return mixed
     *
     * @access public
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * Get Method
     *
     * @return null|string
     *
     * @access public
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Get Form Params
     *
     * Get array suitable for Aura\Html form input helper
     *
     * @return array
     *
     * @access public
     */
    public function getFormParams()
    {
        return [
            'type' => 'hidden',
            'name' => $this->getMethodOverrideParam(),
            'value' => $this->getMethod()
        ];
    }

    /**
     * __toString
     *
     * Get HTML string representing a hidden form input
     *
     * @return string
     *
     * @access public
     */
    public function __toString()
    {
        if (!$this->method) {
            return '';
        }

        $out = '<input';

        foreach ($this->getFormParams() as $key => $value) {
            $out .= ' ' . $key . '="' . $value . '"';
        }

        $out .= ' />';

        return $out;
    }
}
