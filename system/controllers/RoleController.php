<?php
/**
 * @Project: mTrack Bulk sms.
 * @Author: ogegoe
 * @Copyright: Copyright (c) 2015. All Rights Reserved.
 */
class RoleController extends RoleService implements Controller{
    
    function __construct(){
        parent::__construct();

        #links
        $this -> assign('links', array(
            'roles' => array(
                'list' => Controller::ADMIN_ROLES_LIST,
                'add' => Controller::ADMIN_ADD_ROLE,
                'default' => Controller::ADMIN_DEFAULT_ROLE,
            )
        ));
    }

    private function showList(){
        @$userId = $_SESSION[SS_USER];
        $usersrv = new UserService();

        $this->assign('active', 'roles');
        @$this->assign('user', $usersrv->getUserRole($_SESSION[SS_USER]));
        $this->assign('activeUser', $usersrv->getUserById($userId));
        $this->assign('title', 'Roles');
        $this->assign('roles', $this -> getRoleList());
        $this->assign('copyright', Utils::adminCopyright());
        $this->display('roles/main.tpl');
        
    }

    #add admin users
    private function addRole(){
        $title = filter_input(INPUT_POST, 'title');
        $setup = filter_input(INPUT_POST, 'setup_system');
        $agg_mngt = filter_input(INPUT_POST, 'agg_mngt');
        $msps_mngt = filter_input(INPUT_POST, 'msps_mngt');
        $partners_mngt = filter_input(INPUT_POST, 'partners_mngt');
        $members_mngt = filter_input(INPUT_POST, 'members_mngt');
        $status = 1;

        if(!empty($title) || !empty($setup) || !empty($agg_mngt) || !empty($msps_mngt) || !empty($partners_mngt) || !empty($members_mngt)){
            $this->insertRole($title, $setup, $agg_mngt, $msps_mngt, $partners_mngt, $members_mngt, $status);
        }else{
            die('Cannot insert NULL values');
        }
    }

    #Get role by Id
    private function showDefault(){
        $this->assign('role', $this->getRoleOne());
        $this->assign('title', 'User Role Details');
        $this->display('roles/details.tpl');
    }

    #Get role by Id
    private function showDetails(){
        $this->assign('role', $this->getRoleById($_REQUEST['info']));
        $this->assign('title', 'User Role Details');
        $this->display('roles/details.tpl');
    }

    #edit role. details
    private function editDetails(){
        $this->assign('detail', $this->getRoleById($_REQUEST['info']));
        $this->assign('roleId', $_REQUEST['info']);
        $this->display('roles/edit.tpl');
    }

    #update roles details
    private function updateDetails(){
        $rId = $_REQUEST['info'];
        $setup = filter_input(INPUT_POST, 'setup_system');
        $agg = filter_input(INPUT_POST, 'agg_mngt');
        $msps = filter_input(INPUT_POST, 'msps_mngt');
        $partners = filter_input(INPUT_POST, 'partners_mngt');
        $members = filter_input(INPUT_POST, 'members_mngt');

        $this->updateRole($rId, $setup, $agg, $msps, $partners, $members);
    }

    #Show aggregator status tpl
    private function changeStatus(){
        $roleId = $_REQUEST['info'];
        $status = $this->getStatus($roleId);
        $statusId = $status[0]['status'];
        if($statusId == 1){
            $deActivate = 0;
            $this->updateStatus($roleId, $deActivate);
            header('Location: /roles/list');
        }elseif($statusId == 0){
            $activate = 1;
            $this->updateStatus($roleId, $activate);
            header('Location: /roles/list');
        }else{
            die('Code error');
        }
    }

    public function __run(){
        $query = isset($_REQUEST['query']) ? $_REQUEST['query'] : null;
        switch($query){
            case 'add' :
                $this-> addRole();
                break;
            case 'list' :
                $this-> showList();
                break;
            case 'load_default' :
                $this-> showDefault();
                break;
            case 'details' :
                $this-> showDetails();
                break;
            case 'edit' :
                $this-> editDetails();
                break;
            case 'update' :
                $this-> updateDetails();
                break;
            case 'status' :
                $this-> changeStatus();
                break;
            default:
                $this->showList();
                break;
        }
    }
}