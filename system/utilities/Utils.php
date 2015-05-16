<?php
    /**
     * Support provider for the services, objects and controllers
     * @Project: Admin.
     * @Author: ogegoe
     * @Date: 2014-11-02 06:54
     * @Copyright: Copyright (c) 2014. All Rights Reserved.
     */

    class Utils {
        #copyright year
        const COPYRIGHT_YEAR = 2015;

        function __construct(){
            #run inits
        }

        public static function surveyErrorHandler(Exception $e) {
           return $e -> getMessage();
        }

        #Logout function
        public static function logout(){
            foreach($_SESSION as $key => $session){
                unset($_SESSION[$key]);
            }
            session_destroy();
            header('Location: ' . SS_D . "login");
            die;
        }

        #copyright function
        public static function adminCopyright(){
            $year = date('Y');
            $copy = self::COPYRIGHT_YEAR;

            if((int)$year > self::COPYRIGHT_YEAR){
                $copy .= " - $year";
            }

            return sprintf(COPYRIGHT, $copy);
        }

        #begin a new user session
        public static function surveySession($value){
            #session id regeneration
            session_regenerate_id();
            $_SESSION[SS_USER] = $value;
        }
    }
