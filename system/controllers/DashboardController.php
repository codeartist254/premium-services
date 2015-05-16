<?php
/**
 * @Project: mTrack Bulk sms.
 * @Author: ogegoe
 * @Copyright: Copyright (c) 2015. All Rights Reserved.
 */
    class DashboardController extends DashboardService implements Controller{
        function __construct(){
            parent::__construct();
        }

        #Display Dashboard
        private function showDashboard(){
            $userId = $_SESSION[SS_USER];
            $usersrv = new UserService();

            $this->assign('active', 'dashboard');
            $this->assign('user', $usersrv->getUserRole($_SESSION[SS_USER]));
            $this->assign('activeUser', $usersrv->getUserById($userId));
            $this->assign('title', 'Dashboard');
            $this -> assign('copyright', Utils::adminCopyright());
            $this->display('home/dashboard.tpl');
        }

        #Count Aggregators
        private function countAggregators(){
            $this->assign('aggregators', $this->aggregatorsCount());
            $this->display('home/aggregators.tpl');
        }

        #Count MSPs
        private function countMSPS(){
            $this->assign('msps', $this->mspsCount());
            $this->display('home/msps.tpl');
        }

        #Count Members
        private function countMembers(){
            $this->assign('members', $this->membersCount());
            $this->display('home/members.tpl');
        }

        #count  Partners
        private function countPartners(){
            $this->assign('partners', $this->partnersCount());
            $this->display('home/partners.tpl');
        }

        #count roles
        private function countUsers(){
            $this->assign('users', $this->usersCount());
            $this->display('home/users.tpl');
        }

        #count partner types
        private function countPartnerTypes(){
            $this->assign('partner_types', $this->partnerTypesCount());
            $this->display('home/partner_types.tpl');
        }

        #buy sms modal
        private function buySMS(){
            $this->display('home/buy.tpl');
        }

        public function __run(){
            $query = isset($_REQUEST['query']) ? $_REQUEST['query'] : null;
            switch($query){
                case null:
                    $this->showDashboard();
                    break;
                case 'total-aggregators':
                    $this->countAggregators();
                    break;
                case 'total-msps':
                    $this->countMSPS();
                    break;
                case 'total-members':
                    $this->countMembers();
                    break;
                case 'total-partners':
                    $this->countPartners();
                    break;
                case 'total-users':
                    $this->countUsers();
                    break;
                case 'total-partner-types':
                    $this->countPartnerTypes();
                    break;
                case 'buy':
                    $this->buySMS();
                    break;
                default:
                    die('404');
                    break;
            }
        }
    }
