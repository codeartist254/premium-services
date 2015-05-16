<?php
/**
 * Created by PhpStorm.
 * User: peter.wanjala
 * Date: 5/15/2015
 * Time: 4:29 PM
 */

class CredentialsException extends Exception{
    /**
     * @var string
     */
    protected $message = "Invalid credentials";
    /**
     * @var string
     */
    protected $code = "IDESK-2703";
}