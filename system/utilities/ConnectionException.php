<?php
/**
 * Created by PhpStorm.
 * User: peter.wanjala
 * Date: 5/15/2015
 * Time: 4:05 PM
 */

class ConnectionException extends Exception{
    /**
     * @var string
     */
    protected $message = 'Ooops! Looks like the store keeper is tired, or pissed off!';

    /**
     * @var string
     */
    protected $code = 'IDESK-2700';
}