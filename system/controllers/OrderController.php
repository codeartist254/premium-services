<?php

class OrderController extends OrderService implements Controller{
    function __construct(){
        parent::__construct();

        #show all the links
        $this->assign('links', array(
            'orders' => array(
                'main' => Controller::MTRACK_ORDERS_MAIN_PAGE
            )
        ));
    }

    #get purchase list
    private function showOrders(){
        $sentStatus = 'sent'; $schStatus = 'scheduled'; $failedStatus = 'failed';
        $usersrv = new UserService();
        $msgsrv = new MessageService();

        $user = $usersrv->getUserById($_SESSION[SS_USER]);
        $sent = $msgsrv->getMsgByStatus($sentStatus);
        $scheduled = $msgsrv->getMsgByStatus($schStatus);
        $failed = $msgsrv->getMsgByStatus($failedStatus);
        $org = $usersrv->getOrgById($_SESSION[SS_USER]);
        $orders = $this->getOrders();

        $this->assign('userId', $_SESSION[SS_USER]);
        $this->assign('orders', $orders);
        $this->assign('org', $org);
        $this->assign('failed', $failed);
        $this->assign('scheduled', $scheduled);
        $this->assign('sent', $sent);
        $this->assign('user', $user);
        $this->assign('isAdmin', $org[0]['role']);
        $this->display('orders/main.tpl');
    }

    #buy sms
    private function buySMS(){
        $this->assign('userId', $_REQUEST['info']);
        $this->display('orders/buy.tpl');
    }

    #order sms
    private function orderSMS(){
        #inputs
        $client = $_REQUEST['info'];
        $type = 'sms';
        $units = filter_input(INPUT_POST, 'units');
        $payment = filter_input(INPUT_POST, 'buy-sms');

        #process the payment
        $this->insertOrder($type, $client, $units, $payment);
    }

    private function loadDetails(){
        $this->display('orders/details.tpl');
    }

    private function allocateModal(){
        $partnersrv = new PartnerService();

        $this->assign('partners', $partnersrv->getPartnerList());
        $this->display('orders/allocate.tpl');
    }

    private function allocateSMS(){
        $item = 'sms';
        $units = filter_input(INPUT_POST, 'units');
        $client = filter_input(INPUT_POST, 'client');

        $this->insertAllocation($item, $units, $client);
    }

    function __run(){
        $query = isset($_REQUEST['query']) ? $_REQUEST['query'] : null;
        switch($query){
            case null;
            case 'main':
                $this->showOrders();
                break;
            case 'buy':
                $this->buySMS();
                break;
            case 'order':
                $this->orderSMS();
                break;
            case 'details':
                $this->loadDetails();
                break;
            case 'allocate-modal':
                $this->allocateModal();
                break;
            case 'allocate':
                $this->allocateSMS();
                break;
            default:
                die('404');
                break;
        }
    }
} 