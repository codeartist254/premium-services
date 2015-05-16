<?php
/**
 * @Project: Bulk Sms
 * @Author: ogegoe
 * @Copyright: Copyright (c) 2015. All Rights Reserved.
 */

include_once __ROOT__ . '/smarty/libs/Smarty.class.php';

class BaseService extends Smarty{
    #database credentials
    const DBHost = "localhost";
    const DBName = "bulksms";
    const DBUser = "root";
    const DBPwd = "";

    #connection object holder
    private $connection = null;

    function __construct(){
        parent::__construct();
        $this -> template_dir = __SYS__ . '/templates/';
        $this -> compile_dir = __SYS__ . '/templates_c/';
        $this -> cache_dir = __SYS__ . '/cache/';
        $this -> config_dir = __SYS__ . '/configs/';

        # Disable caching!
        $this -> caching = false;

        # Kill debugging!
        $this -> debugging = false;
        $this -> force_compile = true;

        # Path to cdn!
        $this -> assign("cdn", CDN, false);
        $this -> assign("sys_domain", SS_D, false);

        # Set uploads url
        $this -> assign('uploads', UPLOADS);

        #links
        $this->assign('globals', array(
            ############################################
            #   Re- Organisation starts from here v1.1 #
            ############################################
            'partners' => array(
                'submit' => Controller::MTRACK_SUBMIT_NEW_PARTNER,
                'main' => Controller::MTRACK_PARTNERS_MAIN_PAGE,
                'update' => Controller::MTRACK_UPDATE_MTRACK_PARTNER
            ),
            'orders' => array(
                'main' => Controller::MTRACK_ORDERS_MAIN_PAGE,
                'buy' => Controller::MTRACK_BUY_SMS,
                'order' => Controller::MTRACK_ORDER_SMS,
                'allocate_modal' => Controller::MTRACK_ALLOCATE_SMS_MODAL,
                'allocate' => Controller::MTRACK_ALLOCATE_SMS
            ),
            'payments' => array(
                'main' => Controller::MTRACK_PAYMENTS_MAIN_PAGE
            ),
            'messages' => array(
                'main' => Controller::MTRACK_SMSES_COMPOSER_PAGE,
                'all' => Controller::MTRACK_ALL_SMSES_PAGE,
                'sent' => Controller::MTRACK_SENT_SMSES_PAGE,
                'scheduled' => Controller::MTRACK_SCHEDULED_SMSES_PAGE,
                'default' => Controller::MTRACK_LOAD_DEFAULT_MSG_DETAILS
            ),
            'contacts' => array(
                'contacts' => Controller::MTRACK_CONTACTS_PAGE,
                'groups' => Controller::MTRACK_GROUPS_PAGE,
                'add_contact' => Controller::MTRACK_ADD_CONTACT,
                'add_group' => Controller::MTRACK_ADD_GROUP
            ),
            'users' => array(
                'add' => Controller::MTRACK_ADD_USERS,
                'edit' => Controller::ADMIN_USER_EDIT,
                'update' => Controller::ADMIN_USER_UPDATE,
                'status' => Controller::ADMIN_USER_STATUS,
                'settings' => Controller::MTRACK_USER_SETTINGS,
                'password' => Controller::ADMIN_USER_CHANGE_PWD,
                'photo_modal' => Controller::ADMIN_USER_LOAD_PHOTO_MODAL,
                'photo_upload' => Controller::ADMIN_USER_ADD_PHOTO,
                'photo_show' => Controller::ADMIN_USER_SHOW_PHOTO
            )
        ));
    }

    /**
     * Get connection and then prepare the statement
     *
     * @param null $sql
     * @return mysqli|mysqli_stmt
     * @throws Exception
     */
    protected function getConnection($sql = null){
          $this->connection = $con = new mysqli(self::DBHost, self::DBUser, self::DBPwd, self::DBName);
        if($con->connect_error){
            die('Connection error(' . $con->connect_errno. ')' . $con->connect_error);
        }

        #prepared statement
        if(!$sql || !$con = $con->prepare($sql)){
            throw new Exception($this->connection->connect_error);
        }

        #send connection
        return $con;
    }

    /**
     * DB connection without preparing the statement
     *
     * @return mysqli
     */
    protected function mysqliConnection(){
        $mysqli = $this->connection = $con = new mysqli(self::DBHost, self::DBUser, self::DBPwd, self::DBName);
        if($mysqli->connect_errno){
            die('Connection error(' . $mysqli->connect_errno. ')' . $mysqli->connect_error);
        }
        #send connection
        return $mysqli;
    }

    /**
     * Password encryption
     *
     * @param $pwd
     * @return array
     * @throws Exception
     */
    protected function hashPwd($pwd){
        if(!$pwd){
            throw new Exception("Password cannot be empty", 1000);
        }
        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($pwd . $salt, true) . $salt);
        $hash = array(
            'salt' => $salt,
            'encrypted' => $encrypted
        );
        return $hash;
    }

    /**
     * Password decryption
     *
     * @param $salt
     * @param $pwd
     * @return string
     */
    public function checkHash($salt, $pwd) {
        $hash = base64_encode(sha1($pwd . $salt, true) . $salt);
        return $hash;
    }

    /**
     * Conversion of service result to json object
     *
     * @param $result
     * @return string
     */
    protected function getJsonResponse( $result) {
        return json_encode($result);
    }

    #check user rights
    protected function checkRole(){
        $usersrv = new UserService();

        #get the logged in user's id
        $uid = $usersrv->getOrgById($_REQUEST['info']);
        echo'<pre>'; print_r($uid); die;

        $this->assign('uid', $uid);
    }
}