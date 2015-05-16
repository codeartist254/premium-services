<?php

class MessageController extends MessageService implements Controller{
    function __construct(){
        parent::__construct();

        $this->assign('links', array(
            'message' => array(
                'send' => Controller::MTRACK_SEND_PAGE
            )
        ));
    }

    private function showComposer(){
        $sentStatus = 'sent'; $schStatus = 'scheduled'; $failedStatus = 'failed';
        $usersrv = new UserService();
        $contactsrv = new ContactService();
        $contacts = $usersrv->getUserList();
        $user = $usersrv->getUserById($_SESSION[SS_USER]);
        $groups = $contactsrv->getGroupList();
        $msgs = $this->getMsgs();
        $sent = $this->getMsgByStatus($sentStatus);
        $scheduled = $this->getMsgByStatus($schStatus);
        $failed = $this->getMsgByStatus($failedStatus);
        $org = $usersrv->getOrgById($_SESSION[SS_USER]);

        $this->assign('org', $org);
        $this->assign('failed', $failed);
        $this->assign('scheduled', $scheduled);
        $this->assign('sent', $sent);
        $this->assign('user', $user);
        $this->assign('msgs', $msgs);
        $this->assign('groups', $groups);
        $this->assign('isAdmin', $org[0]['role']);
        $this->assign('contacts', $contacts);
        $this->assign('userId', $_SESSION[SS_USER]);
        $this->display('messages/main.tpl');
    }

    #send message
    private function sendMsg(){
        echo'<pre>'; print_r($_REQUEST); die;
        #inits
        $usersrv = new UserService();
        $receiver = null; $group = null;

        #get sender
        $user = $usersrv->getUserById($_REQUEST['info']);
        $sender = $user[0]['fname'];

        #get receivers
        $receivers = '';
        if (is_array(filter_input(INPUT_POST, 'contact'))) {
            $receivers = json_encode(filter_input(INPUT_POST, 'contact'));
        }
//        echo'<Pre>'; print_r($receivers); die;
        foreach($_REQUEST['group'] as $grp_arr){
            $group = $grp_arr;
        }

        #get the msg
        $msg = $_REQUEST['msg'];

        #is this msg to be scheduled or to be sent?
        if(isset($_POST['schedule']) && $_POST['schedule'] == 'scheduled'){
            $status = $_POST['schedule'];
        }else{
            $status = 'sent';
        }

        #fire the bomb!!
        if(isset($sender, $receiver, $msg, $group)){
            $this->insertMsg($msg, $sender, $receiver, $group, $status);
        }
    }

    private function showAll(){
        $sentStatus = 'sent'; $schStatus = 'scheduled'; $failedStatus = 'failed';
        $usersrv = new UserService();
        $msgs = $this->getMsgs();
        $user = $usersrv->getUserById($_SESSION[SS_USER]);
        $sent = $this->getMsgByStatus($sentStatus);
        $scheduled = $this->getMsgByStatus($schStatus);
        $failed = $this->getMsgByStatus($failedStatus);
        $org = $usersrv->getOrgById($_SESSION[SS_USER]);

        $this->assign('org', $org);
        $this->assign('failed', $failed);
        $this->assign('scheduled', $scheduled);
        $this->assign('sent', $sent);
        $this->assign('user', $user);
        $this->assign('isAdmin', $user[0]['role']);
        $this->assign('msgs', $msgs);
        $this->display('messages/all.tpl');
    }

    private function showSent(){
        $sentStatus = 'sent'; $schStatus = 'scheduled'; $failedStatus = 'failed';
        $usersrv = new UserService();

        $msgs = $this->getMsgs();
        $user = $usersrv->getUserById($_SESSION[SS_USER]);
        $sent = $this->getMsgByStatus($sentStatus);
        $scheduled = $this->getMsgByStatus($schStatus);
        $failed = $this->getMsgByStatus($failedStatus);
        $org = $usersrv->getOrgById($_SESSION[SS_USER]);

        $this->assign('org', $org);
        $this->assign('failed', $failed);
        $this->assign('scheduled', $scheduled);
        $this->assign('sent', $sent);
        $this->assign('user', $user);
        $this->assign('isAdmin', $user[0]['role']);
        $this->assign('msgs', $msgs);
        $this->display('messages/sent.tpl');
    }

    private function showScheduled(){
        $sentStatus = 'sent'; $schStatus = 'scheduled'; $failedStatus = 'failed';
        $usersrv = new UserService();

        $user = $usersrv->getUserById($_SESSION[SS_USER]);
        $msgs = $this->getMsgs();
        $sent = $this->getMsgByStatus($sentStatus);
        $scheduled = $this->getMsgByStatus($schStatus);
        $failed = $this->getMsgByStatus($failedStatus);
        $org = $usersrv->getOrgById($_SESSION[SS_USER]);

        $this->assign('org', $org);
        $this->assign('failed', $failed);
        $this->assign('scheduled', $scheduled);
        $this->assign('sent', $sent);
        $this->assign('user', $user);
        $this->assign('isAdmin', $user[0]['role']);
        $this->assign('msgs', $msgs);
        $this->display('messages/scheduled.tpl');
    }

    private function getContacts(){
        $contactsrv = new ContactService();
        $contacts = $contactsrv->searchContact();

        $result = json_encode($contacts, JSON_PRETTY_PRINT);

        echo $result;
    }

    private function getGroups(){
        $contactsrv = new ContactService();
        $groups = $contactsrv->searchGroup();

        $result = json_encode($groups);

        echo $result;

    }

    private function loadDefault(){
        $this->display('messages/default.tpl');
    }

    private function loadDetails(){
        $this->display('messages/details.tpl');
    }

    function __run(){
        switch($query = isset($_REQUEST['query']) ? $_REQUEST['query'] : null){
            case null:
            case 'main':
                $this->showComposer();
                break;
            case 'all':
                $this->showAll();
                break;
            case 'sent':
                $this->showSent();
                break;
            case 'scheduled':
                $this->showScheduled();
                break;
            case 'send':
                $this->sendMsg();
                break;
            case 'select-contacts':
                $this->getContacts();
                break;
            case 'select-groups':
                $this->getGroups();
                break;
            case 'load-default':
                $this->loadDefault();
                break;
            case 'details':
                $this->loadDetails();
                break;
            default:
                die('404');
                break;
        }
    }
}