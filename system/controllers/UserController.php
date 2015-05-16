<?php
/**
 * @Project: mTrack Bulk sms.
 * @Author: ogegoe
 * @Copyright: Copyright (c) 2015. All Rights Reserved.
 */
define ("MAX_SIZE", "1000");

class UserController extends UserService implements Controller{
    function __construct(){
        parent::__construct();
        #links
        $this->assign('links',array(
            'users' =>array(
                'new' => Controller::MTRACK_NEW_USER,
                'default_user' => Controller::ADMIN_USER_DEFAULT
            )
        ));
    }

    #show full list
    private function showList(){
        @$userId = $_SESSION[SS_USER];
        $rolesrv = new RoleService();
        $users = $this->getUserList();

        $this->assign('active', 'users');
        @$this->assign('user', $this->getUserRole($_SESSION[SS_USER]));
        $this->assign('roles', $rolesrv->getRoleList());
        $this->assign('activeUser', $this->getUserById($userId));
        $this->assign('title', 'Clients');
        $this->assign('users', $this -> getUserList());
        $this->assign('copyright', Utils::adminCopyright());
        $this->display('users/main.tpl');
    }

    #new user modal
    private function newUser(){
        $this->display('users/new.tpl');
    }

    #add admin users
    private function addUser(){
        $result = null;
        try{
            $fname = filter_input(INPUT_POST, 'fname');
            $lname = filter_input(INPUT_POST, 'lname');
            $email = filter_input(INPUT_POST, 'email');
            $phone = filter_input(INPUT_POST, 'phone');
            $pwd = filter_input(INPUT_POST, 'pwd');
            $role = 1;
            $status = 1;


            if(isset($fname, $lname, $email, $pwd)){
                #encrypt the pwd
                $pass = $this -> hashPwd($pwd);
                $password = $pass['encrypted'];
                $salt = $pass['salt'];

                #now process data...
                echo  $this->insertUser($fname, $lname, $role, $phone, $email, $password, $salt, $status);
            }
        }catch (Exception $e){
            die(" User registration error: " . $e -> getMessage());
        }
    }

    #upload user photo modal
    private function photoModal(){
        $this->assign('userId', $_REQUEST['info']);
        $this->display('users/upload_photo.tpl');
    }

    #Insert user photo
    private function addPhoto(){
        $id = $_REQUEST['info'];
        $errors = 0;
        if($photo = ($_FILES['photo']['name'])){
            $filename = stripslashes($_FILES['photo']['name']);
            $extension = $this->getExtension($filename);
            $extension = strtolower($extension);
            if(($extension != "jpg") && ($extension != "jpeg") && ($extension != "png")&& ($extension != "gif")&& ($extension != "JPG") && ($extension != "JPEG")&& ($extension != "PNG") && ($extension != "GIF")){
                echo "Unknown extension";
                $errors = 1;
            }else{
                $size = filesize($_FILES['photo']['tmp_name']);
                if($size > MAX_SIZE*1024){
                    echo "You have exceeded the file limit";
                    $errors = 1;
                }

                $image_name = time(). '.' .$extension;
                $newName = "uploads/".$image_name;
                $copied = copy($_FILES['photo']['tmp_name'], $newName);
                if(!$copied) echo 'Copy unsuccessful';
                else echo 'Uploaded successfully /n';

                #process this data
                $this->insertPhoto($id, $newName);
            }
        }
    }

    #get user photo
    private function showPhoto(){
        @$id = $_REQUEST['info'];
        $photo = $this->getPhoto($id);

        $this->assign('photo', $photo);
        $this->display('users/photo.tpl');
    }

    #user profile
    private function showDetails(){
        $this->assign('user', $this->getUserById($_REQUEST['info']));
        $this->assign('title', 'User Details');
        $this->display('users/details.tpl');
        
    }
    
    #user profile
    private function showDefault(){
        $this->assign('user', $this->getUserOne());
        $this->assign('title', 'User Details');
        $this->display('users/details.tpl');
        
    }

    #logged in user
    public function activeUser(){
        #get https request
        $userId = $_SESSION[SS_USER];

        #get user details base on the user id from the https request
        $activeuser = $this->getUserById($userId);

        return $activeuser;
    }

    #edit agg. details
    private function editDetails(){
        $rolesrv = new RoleService();

        $this->assign('roles', $rolesrv->getRoleList());
        $this->assign('users', $this -> getUserList());
        $this->assign('details', $this->getUserById($_REQUEST['info']));
        $this->assign('userId', $_REQUEST['info']);
        $this->display('users/edit.tpl');

    }

    #update agg. details
    private function updateUser(){
        $id = $_REQUEST['info'];
        $fname = filter_input(INPUT_POST, 'fname');
        $sname = filter_input(INPUT_POST, 'lname');
        $email = filter_input(INPUT_POST, 'email');
        $roleId = filter_input(INPUT_POST, 'role');

        $this->editUser($id, $fname, $sname, $roleId, $email);
    }

    #change user status
    private function changeStatus(){
        $userId = $_REQUEST['info'];
        $status = $this->getStatus($userId);
        $statusId = $status[0]['status'];
        if($statusId == 1){
            $deActivate = 0;
            $this->updateStatus($userId, $deActivate);
            header('Location: /users/list');
        }elseif($statusId == 0){
            $activate = 1;
            $this->updateStatus($userId, $activate);
            header('Location: /users/list');
        }else{
            die('Code error');
        }
    }

    #Logged in user details settings
    private function adminSettings(){
        $userId = $_SESSION[SS_USER];

        $this->assign('userId', $userId);
        $this->display('users/settings.tpl');
    }

    #change logged in user password
    private function changePwd(){
        $id = $_REQUEST['info'];
        $pwd = filter_input(INPUT_POST, 'pwd');
        $conf_pwd = filter_input(INPUT_POST, 'conf_pwd');

        if($pwd == $conf_pwd){
            $pass = $this->hashPwd($pwd);
            $password = $pass['encrypted'];
            $salt = $pass['salt'];

            $this->updatePassword($id, $salt, $password);
        }else{
            die("Password do not match. Try again!");
        }
    }

    public function __run(){
        switch($query = isset($_REQUEST['query']) ? $_REQUEST['query'] : null){
            case null:
            case 'list':
                $this-> showList();
                break;
            case 'new':
                $this-> newUser();
                break;
            case 'add' :
                $this-> addUser();
                break;
            case 'details' :
                $this-> showDetails();
                break;
            case 'default_user' :
                $this-> showDefault();
                break;
            case 'logged_in' :
                $this-> activeUser();
                break;
            case 'edit' :
                $this-> editDetails();
                break;
            case 'update' :
                $this-> updateUser();
                break;
            case 'status' :
                $this-> changeStatus();
                break;
            case 'settings' :
                $this-> adminSettings();
                break;
            case 'change_pwd' :
                $this-> changePwd();
                break;
            case 'photo-modal' :
                $this-> photoModal();
                break;
            case 'photo-upload' :
                $this-> addPhoto();
                break;
            case 'photo-show' :
                $this-> showPhoto();
                break;
            default:
                die('404');
                break;
        }
    }
}