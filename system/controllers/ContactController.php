<?php
/**
 * @Project: mTrack Bulk sms.
 * @Author: ogegoe
 * @Copyright: Copyright (c) 2015. All Rights Reserved.
 */
    class ContactController extends ContactService implements Controller{
        function __construct(){
            parent::__construct();

            $this->assign('links', array(
                'contacts' => array(
                    'new_contact' => Controller::MTRACK_NEW_CONTACT_MODAL,
                    'new_group' => Controller::MTRACK_NEW_GROUP_MODAL
                )
            ));
        }

        private function showContacts(){
            $sentStatus = 'sent'; $schStatus = 'scheduled'; $failedStatus = 'failed';
            $usersrv = new UserService();
            $msgsrv = new MessageService();

            $user = $usersrv->getUserById($_SESSION[SS_USER]);
            $contacts = $this->getContactList();
            $sent = $msgsrv->getMsgByStatus($sentStatus);
            $scheduled = $msgsrv->getMsgByStatus($schStatus);
            $failed = $msgsrv->getMsgByStatus($failedStatus);
            $org = $usersrv->getOrgById($_SESSION[SS_USER]);

            $this->assign('org', $org);
            $this->assign('failed', $failed);
            $this->assign('scheduled', $scheduled);
            $this->assign('sent', $sent);
            $this->assign('userId', $_SESSION[SS_USER]);
            $this->assign('user', $user);
            $this->assign('contacts', $contacts);
            $this->assign('isAdmin', $user[0]['role']);
            $this->display('contacts/contacts.tpl');
        }

        private function newContact(){
            $groups = $this->getGroupList();

            $this->assign('userId', $_REQUEST['info']);
            $this->assign('groups', $groups);
            $this->display('contacts/new_contact.tpl');
        }

        private function addContact(){
            $name = $_REQUEST['fullname'];
            $phone = $_REQUEST['mobile'];
            $group = $_REQUEST['group'];

            if(isset($name, $phone, $group)){
                $this->insertContact($name, $phone, $group);
            }
        }

        private function showGroups(){
            $sentStatus = 'sent'; $schStatus = 'scheduled'; $failedStatus = 'failed';
            $usersrv = new UserService();
            $msgsrv = new MessageService();

            $user = $usersrv->getUserById($_SESSION[SS_USER]);
            $groups = $this->getGroupList();
            $sent = $msgsrv->getMsgByStatus($sentStatus);
            $scheduled = $msgsrv->getMsgByStatus($schStatus);
            $failed = $msgsrv->getMsgByStatus($failedStatus);
            $org = $usersrv->getOrgById($_SESSION[SS_USER]);

            $this->assign('org', $org);
            $this->assign('failed', $failed);
            $this->assign('scheduled', $scheduled);
            $this->assign('sent', $sent);
            $this->assign('userId', $_SESSION[SS_USER]);
            $this->assign('user', $user);
            $this->assign('groups', $groups);
            $this->assign('isAdmin', $user[0]['role']);
            $this->display('contacts/groups.tpl');
        }

        private function newGroup(){
            $this->assign('userId', $_REQUEST['info']);
            $this->display('contacts/new_group.tpl');
        }

        private function addGroup(){
            $name = $_REQUEST['groupname'];
            $descr = $_REQUEST['descr'];

            if(isset($name, $descr)){
                $this->insertGroup($name, $descr);
            }
        }

        private function loadDetails(){
        $this->display('contacts/details.tpl');
    }

        public function __run(){
            switch($query = isset($_REQUEST['query']) ? $_REQUEST['query'] : null){
                case null:
                case 'groups':
                    $this->showGroups();
                break;
                case 'contacts':
                    $this->showContacts();
                break;
                case 'new-contact':
                    $this->newContact();
                break;
                case 'add-contact':
                    $this->addContact();
                break;
                case 'new-group':
                    $this->newGroup();
                break;
                case 'add-group':
                    $this->addGroup();
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