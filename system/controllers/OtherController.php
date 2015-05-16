<?php
/**
 * Created by PhpStorm.
 * User: C.E.O
 * Date: 2015-04-21
 * Time: 18:55
 */

class OtherController extends OtherServices implements Controller{
    function __construct(){
        parent::__construct();
    }

    #show contacts page
    private function showContacts(){
        $userId = $_SESSION[SS_USER];
        $usersrv = new UserService();

        $this->assign('user', $usersrv->getUserRole($_SESSION[SS_USER]));
        $this->assign('activeUser', $usersrv->getUserById($userId));
        $this->assign('title', 'New Message');
        $this->display('messages/compose.tpl');
    }

    #add contact processor
    private function addContact(){

    }

    #show text-2-join page
    private function text2Join(){

    }

    #activate service
    private function activateText2Join(){

    }

    #show contact archives
    private function contactArchives(){

    }

    #show msgs archives
    private function msgsArchives(){

    }

    function __run(){
        switch($query = isset($_REQUEST['query']) ? $_REQUEST['query'] : null){
            case 'contacts':
                $this->showContacts();
                break;
            case 'add-contact':
                $this->addContact();
                break;
            case 'text-2-join':
                $this->text2Join();
                break;
            case 'activate-text-2-join':
                $this->activateText2Join();
                break;
            case 'contact-archive':
                $this->contactArchives();
                break;
            case 'msgs-archive':
                $this->msgsArchives();
                break;
            default:
                die('404');
                break;
        }
    }
} 