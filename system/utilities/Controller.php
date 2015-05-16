<?php
/**
 * @Project: mTrack Bulk sms.
 * @Author: ogegoe
 * @Copyright: Copyright (c) 2015. All Rights Reserved.
 */
interface Controller{
    #Access Controller
    const ADMIN_REGISTER = 'access/signup';

    const ADMIN_REGISTRATION_PROCESS = 'access/register';

    const ADMIN_LOGIN = 'access/signin';

    const ADMIN_LOGIN_PROCESS = 'access/login';

    const ADMIN_REG_PAGE = 'access/reg';

    const ADMIN_REG_PROCESS = 'access/register';

    #Dashboard
    const ADMIN_DASHBOARD_AGGREGATORS_COUNT = 'dashboard/total-aggregators';

    const ADMIN_DASHBOARD_MSPS_COUNT = 'dashboard/total-msps';

    const ADMIN_DASHBOARD_MEMBERS_COUNT = 'dashboard/total-members';

    const ADMIN_DASHBOARD_PARTNERS_COUNT = 'dashboard/total-partners';

    const ADMIN_DASHBOARD_USERS_COUNT = 'dashboard/total-users';

    const ADMIN_DASHBOARD_PARTNER_TYPES_COUNT = 'dashboard/total-partner-types';

    const ADMIN_DASHBOARD_BUY_SMS_MODAL = 'dashboard/buy';

    #Side Bar
    const ADMIN_DASHBOARD = 'dashboard';

    const MTRACK_SMS_REQUESTS = 'requests/';

    const ADMIN_USERS = 'users/list';

    const ADMIN_ROLES_LIST = 'roles/list';

    const ADMIN_PARTNERS_LIST = 'partners/list';

    const ADMIN_COMPOSE_MSG = 'message/compose';

    const ADMIN_SENT_MSG = 'message/sent';

    const ADMIN_SCHEDULED_MSG = 'message/scheduled';

    const MTRACK_CONTACT_LIST = 'contacts/';

    const MTRACK_GROUP_LIST = 'contacts/groups';

    #roles
    const ADMIN_ADD_ROLE = 'roles/add';

    const ADMIN_DEFAULT_ROLE = 'roles/load_default';

    const ADMIN_ROLE_EDIT = 'roles/edit/';

    const ADMIN_ROLE_UPDATE = 'roles/update/';

    const ADMIN_ROLE_CHANGE_STATUS = 'roles/status/';

    #Orders
    const MTRACK_BUY_SMS = 'orders/buy/';

    ############################################
    #   Re- Organisation starts from here v1.1 #
    ############################################
    #Orders
    const MTRACK_ORDERS_MAIN_PAGE = 'orders/main';

    const MTRACK_ORDER_SMS = 'orders/order/';

    const MTRACK_ALLOCATE_SMS_MODAL = 'orders/allocate-modal/';

    const MTRACK_ALLOCATE_SMS = 'orders/allocate';

    #Payments
    const MTRACK_PAYMENTS_MAIN_PAGE = 'payments/main';

    #Messages
    const MTRACK_SMSES_COMPOSER_PAGE = 'messages/main';

    const MTRACK_ALL_SMSES_PAGE = 'messages/all';

    const MTRACK_SENT_SMSES_PAGE = 'messages/sent';

    const MTRACK_SCHEDULED_SMSES_PAGE = 'messages/scheduled';

    const MTRACK_SEND_PAGE = 'messages/send/';

    const MTRACK_LOAD_DEFAULT_MSG_DETAILS = 'messages/load-default';

    #Contacts
    const MTRACK_GROUPS_PAGE = 'contacts/groups';

    const MTRACK_CONTACTS_PAGE = 'contacts/contacts';

    const MTRACK_NEW_CONTACT_MODAL = 'contacts/new-contact/';

    const MTRACK_ADD_CONTACT = 'contacts/add-contact/';

    const MTRACK_NEW_GROUP_MODAL = 'contacts/new-group/';

    const MTRACK_ADD_GROUP = 'contacts/add-group/';

    #Partners
    const MTRACK_PARTNERS_MAIN_PAGE = 'partners/main';

    const MTRACK_NEW_PARTNER_MODAL = 'partners/add/';

    const MTRACK_SUBMIT_NEW_PARTNER = 'partners/submit/'
    ;
    const MTRACK_UPDATE_MTRACK_PARTNER_MODAL = 'partners/edit/';

    const MTRACK_UPDATE_MTRACK_PARTNER = 'partners/update/';

    #users
    const MTRACK_USER_SETTINGS = 'users/settings/';

    const MTRACK_NEW_USER = 'users/new';

    const MTRACK_ADD_USERS = 'users/add';

    const ADMIN_USER_EDIT = 'users/edit/';

    const ADMIN_USER_UPDATE = 'users/update/';

    const ADMIN_USER_DEFAULT = 'users/default_user';

    const ADMIN_USER_STATUS = 'users/status/';

    const ADMIN_USER_CHANGE_PWD = 'users/change_pwd/';

    const ADMIN_USER_LOAD_PHOTO_MODAL = 'users/photo-modal/';

    const ADMIN_USER_ADD_PHOTO = 'users/photo-upload/';

    const ADMIN_USER_SHOW_PHOTO = 'users/photo-show/';

    #System Logout
    const LOGOUT = 'logout';

    public function __run();
}