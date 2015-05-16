<?php
/**
 * @Project: mTrack Bulk sms.
 * @Author: ogegoe
 * @Copyright: Copyright (c) 2015. All Rights Reserved.
 */

class PaymentController extends PaymentService implements Controller{
    function __construct(){
        parent::__construct();
    }

    private function showMain(){
        $sentStatus = 'sent';$schStatus = 'scheduled'; $failedStatus = 'failed';
        $msgsrv = new MessageService();
        $usersrv = new UserService();

        $user = $usersrv->getUserById($_SESSION[SS_USER]);
        $sent = $msgsrv->getMsgByStatus($sentStatus);
        $scheduled = $msgsrv->getMsgByStatus($schStatus);
        $failed = $msgsrv->getMsgByStatus($failedStatus);
        $org = $usersrv->getOrgById($_SESSION[SS_USER]);

        $this->assign('org', $org);
        $this->assign('failed', $failed);
        $this->assign('scheduled', $scheduled);
        $this->assign('sent', $sent);
        $this->assign('isAdmin', $org[0]['role']);
        $this->assign('user', $user);
        $this->display('payments/main.tpl');
    }

    private function loadDetails(){
        $this->display('payments/details.tpl');
    }

    function __run(){
        $query = isset($_REQUEST['query']) ? $_REQUEST['query'] : null;
        switch($query){
            case null:
            case 'main':
                $this->showMain();
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