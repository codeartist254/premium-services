<?php
/**
 * @Project: mTrack Bulk SMS.
 * @Author: ogegoe
 * @Copyright: Copyright (c) 2015. All Rights Reserved.
 */


include_once 'config.php';
    date_default_timezone_set("Africa/Nairobi");
    # Get module!
    $module = filter_input(INPUT_GET, 'module');

    # Initialize controller object!
    $controller = null;

    #logout utility
    if($module === 'logout'){
        Utils::logout();
    }

    # Is the user logged in?
    if (!isset($_SESSION[SS_USER])) {
        $controller = new AccessController();
    } else {
        switch ($module) {
            case 'dashboard':
                $controller = new DashboardController();
                break;
            case 'users':
                $controller = new UserController();
                break;
            case 'roles':
                $controller = new RoleController();
                break;
            case 'contacts':
                $controller = new ContactController();
                break;

            ############################################
            #   Re- Organisation starts from here v1.1 #
            ############################################

            case 'partners':
                $controller = new PartnerController();
                break;
            case 'orders':
                $controller = new OrderController();
                break;
            case 'payments':
                $controller = new PaymentController();
                break;
            case 'messages':
                $controller = new MessageController();
                break;
            default:
                $controller = new MessageController();
            break;
        }
    }

    $controller -> __run();
