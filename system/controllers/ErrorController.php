<?php
/**
 * Handle errors!
 *
 * @project      mTrack Bulk SMs
 * @Author       Wachiye Wanyama, Peter Mare Wanjala
 * @copyright    Copyright (C) 2012 - 2013 . All rights reserved.
 */
class ErrorController extends BaseService implements Controller {
    # Error code!
    public $code = 404;

    # Title
    public $title = null;

    # Message
    public $msg = null;

    # Error page image
    public $emoticon = 'error-content';

    # Exclude common errors!
    private $haystack = array(404, 403, 500);

    function __construct($code = 404, $message = null) {
        parent::__construct();
        # Set the code!
        if ($code) {
            $this -> setErrorCode($code);
        }

        # Do we have a message?
        $this -> setMessage($message);
        return $this;
    }

    /**
     * Exec implementation!
     */

    public function __run() {
        # Get the code!
        $code = $this -> getErrorCode();

        # Set the headers!
        header("HTTP/1.0 {$this->code}");

        # Get the template and display!
        $this -> assign('error', $this);
        $this -> display("errors/main.tpl");

        # Terminate!
        die ;
    }

    /**
     * Set error code!
     */
    public function setErrorCode($code) {
        $this -> code = $code;

        # Trigger change in message and title!
        $this -> setMessage();
        $this -> setTitle();
    }

    /**
     * Set error page title!
     */
    public function setTitle($title = null) {
        switch ($this->getErrorCode()) {
            case 500 :
                $title = self::TITLE_500;
                $this -> emoticon = 'error-content-code';
                break;
            case 404 :
                $title = self::TITLE_404;
                $this -> emoticon = 'error-content';
                break;
            case 403 :
                $title = self::TITLE_403;
                $this -> emoticon = 'error-content-no';
                break;
            default :
                # Carry on with the given title (or if null, use a general one);
                if (!$title) {
                    $title = self::TITLE_GEN;
                    $this -> emoticon = 'error-content';
                }
                break;
        }
        $this -> title = $title;
    }

    /**
     * Set error message!
     */
    public function setMessage($msg = null) {
        # Templates exist for errors 404, 403 and 500!
        if (!$msg) {
            $code = $this -> getErrorCode();
            if (in_array($code, $this -> haystack)) {
                $msg = $this -> fetch("errors/{$code}.tpl");
            }
        }
        $this -> msg = $msg;
    }

    /**
     * Get message!
     */
    public function getMessage() {
        return $this -> msg;
    }

    /**
     * Get page title!
     */
    public function getTitle() {
        return $this -> title;
    }

    /**
     * Get error code!
     */
    public function getErrorCode() {
        return $this -> code;
    }

    # Define constants here!

    const TITLE_500 = 'Server Error';

    const TITLE_404 = 'Page not found';

    const TITLE_403 = 'Forbiden';

    const TITLE_GEN = "Error";
}