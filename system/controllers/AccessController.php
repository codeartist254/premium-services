<?php

/**
 * @Project  : mTrack Bulk sms.
 * @Author   : ogegoe
 * @Copyright: Copyright (c) 2015. All Rights Reserved.
 */
class AccessController extends BaseService implements Controller {
    /**
     * Define links
     */
    function __construct () {
        parent::__construct();

        #links
        $this->assign('links', [
            'access' => [
                'signup'       => Controller::ADMIN_REGISTER,
                'login'        => Controller::ADMIN_LOGIN_PROCESS,
                'reg'          => Controller::ADMIN_REG_PAGE,
                'registration' => Controller::ADMIN_REG_PROCESS
            ]
        ]);
    }

    /**
     * Display registration form
     */
    private function showRegister () {
        $this->assign('title', 'Register');
        $this->display('login/register.tpl');
    }

    /**
     * Register a partner
     *
     * @throws \Exception
     */
    private function regPartner () {
        $name = filter_input(INPUT_POST, 'name');
        $type = filter_input(INPUT_POST, 'type');
        $phone = filter_input(INPUT_POST, 'phone');
        $email = filter_input(INPUT_POST, 'email');
        $pwd = filter_input(INPUT_POST, 'pwd');
        $role = '0';

        if (isset($name, $type, $phone, $email, $pwd)) {
            #password encryption
            $pass = $this->hashPwd($pwd);
            $password = $pass['encrypted'];
            $salt = $pass['salt'];

            #now save data
            $partnersrv = new PartnerService();
            $org = $partnersrv->insertOrg($name, $type, $phone, $email, $password, $salt, $role);
            if (is_int($org)) {
                session_regenerate_id();
                $_SESSION[ SS_USER ] = $org;
                return $this->getJsonResponse(['status' => true]);
            }
            return $org;
        }
    }

    /**
     * Reset password
     */
    public function resetPwd () {
        #get the input password
        $pwd = filter_input(INPUT_POST, 'pwd');

        #encrypt the pwd
        if (isset($pwd)) {
            $pass = $this - hashPwd($pwd);
            $password = $pass['encrypted'];
            $salt = $pass['salt'];
        }

        #save the new pwd and salt
        $usersrv = new UserService();
        $usersrv->resetPwd($password, $salt);
    }


    /**
     * Display login page
     */
    protected function showLogin () {
        $this->assign('title', 'Login');
        $this->assign('errorstatus', filter_input(INPUT_GET, 'query') ?: filter_input(INPUT_POST, 'query') );
        $this->display('login/main.tpl');
    }

    /**
     * Login user
     */
    private function loginUser () {
        $usersrv = new UserService();
        $org = $usersrv->matchPwd(filter_input(INPUT_POST, 'uname'), filter_input(INPUT_POST, 'pwd'));
        if ($org && !is_string($org)) {
            session_regenerate_id();
            $_SESSION[ SS_USER ] = $org['id'];
            $org = $this->getJsonResponse(['status' => true]);
        }
        return print_r($org);
    }

    /**
     * Route requests
     */
    public function __run () {
        $query = isset($_REQUEST['query']) ? $_REQUEST['query'] : null;
        switch ($query) {
            case 'login':
                $this->loginUser();
                break;
            case 'reg':
                $this->showRegister();
                break;
            case 'register':
                $this->regPartner();
                break;
            default:
                $this->showLogin();
                break;
        }
    }
}
