<?php
/**
 * @Project: mTrack Bulk sms.
 * @Author: ogegoe
 * @Copyright: Copyright (c) 2015. All Rights Reserved.
 */
class PartnerController extends PartnerService implements Controller{
    function __construct(){
        parent::__construct();

        #links
        $this -> assign('links', array(
            'partners' => array(
                'new' => Controller::MTRACK_NEW_PARTNER_MODAL,
                'main' => Controller::MTRACK_PARTNERS_MAIN_PAGE,
                'edit' => Controller::MTRACK_UPDATE_MTRACK_PARTNER_MODAL
            )
        ));
    }

    private function newPartner(){
        $this->assign('userId', $_SESSION[SS_USER]);
        $this->display('partners/new.tpl');
    }

    private function addPartner(){
        $partner = $_REQUEST['biz_name'];
        $phone = $_REQUEST['phone'];
        $person = $_REQUEST['person'];
        $person_phone = $_REQUEST['person_phone'];
        $person_email = $_REQUEST['person_email'];

        $this->insertPartner($partner, $phone, $person, $person_phone, $person_email);
    }

    private function showMain(){
        $sentStatus = 'sent'; $schStatus = 'scheduled'; $failedStatus = 'failed';
        $usersrv = new UserService();
        $msgsrv = new MessageService();

        $user = $usersrv->getUserById($_SESSION[SS_USER]);
        $partners = $this->getPartnerList();
        $sent = $msgsrv->getMsgByStatus($sentStatus);
        $scheduled = $msgsrv->getMsgByStatus($schStatus);
        $failed = $msgsrv->getMsgByStatus($failedStatus);
        $org = $usersrv->getOrgById($_SESSION[SS_USER]);

        $this->assign('org', $org);
        $this->assign('failed', $failed);
        $this->assign('scheduled', $scheduled);
        $this->assign('sent', $sent);
        $this->assign('user', $user);
        $this->assign('isAdmin', $org[0]['role']);
        $this->assign('partners', $partners);
        $this->assign('userId', $_SESSION[SS_USER]);
        $this->display('partners/main.tpl');
    }

    private function loadDetails(){
        $pId = $_REQUEST['info'];
        $partner = $this->getPartnerById($pId);

        $this->assign('pId', $pId);
        $this->assign('partner', $partner);
        $this->display('partners/details.tpl');
    }

    #open the editing pop up
    private  function updateModal(){
        $pId = $_REQUEST['info'];

        $this->assign('partnerId', $pId);
        $this->assign('partner', $this->getPartnerById($pId));
        $this->display('partners/edit.tpl');
    }

    private function updatePartner(){
        $pid = $_REQUEST['info'];
        $biz_name = filter_input(INPUT_POST, 'biz_name');
        $biz_phone = filter_input(INPUT_POST, 'phone');
        $contact = filter_input(INPUT_POST, 'person');
        $contact_phone = filter_input(INPUT_POST, 'person_phone');
        $contact_email = filter_input(INPUT_POST, 'person_email');

        $this->updateOrganisation($pid, $biz_name, $biz_phone, $contact, $contact_phone, $contact_email);
    }


    public function __run(){
        $query = isset($_REQUEST['query']) ? $_REQUEST['query'] : null;
        switch($query){
            case null:
            case 'add':
                $this->newPartner();
                break;
            case 'submit':
                $this->addPartner();
                break;
            case 'main':
                $this->showMain();
                break;
            case 'details':
                $this->loadDetails();
                break;
            case 'edit':
                $this->updateModal();
                break;
            case 'update':
                $this->updatePartner();
                break;
            default:
                die('404');
                break;
        }
    }
}
