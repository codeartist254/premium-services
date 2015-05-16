<?php
/**
 * Created by PhpStorm.
 * User: peter.wanjala
 * Date: 5/15/2015
 * Time: 4:15 PM
 */

class DBStatementException extends Exception{
    /**
     * @var string
     */
    protected $message = 'Something went wrong';
    /**
     * @var string
     */
    protected $code = 'IDESK-2701';
}