<?php
/**
 * @Project: mTrack Bulk sms.
 * @Author: ogegoe
 * @Copyright: Copyright (c) 2015. All Rights Reserved.
 */
class DashboardService extends BaseService{
    function __constructor(){
        parent::__construct();
    }

    #count aggregators
    protected function aggregatorsCount(){
        try{
            $con = $this->mysqliConnection();
            $result = $con->query("SELECT * FROM messages");
            $row_cnt = $result->num_rows;
            $result->close();
            $con->close();

            return $row_cnt;
        }catch (Exception $e){
            die('Error - Cannot get agg row count: ' . $e->getMessage());
        }
    }

    #count MSPs
    protected function mspsCount(){
        try{
            $con = $this->mysqliConnection();
            $result = $con->query("SELECT * FROM medical_facility");
            $row_cnt = $result->num_rows;
            $result->close();
            $con->close();

            return $row_cnt;
        }catch (Exception $e){
            die('Error - Cannot get msps row count: ' . $e->getMessage());
        }
    }

    #count members
    protected function membersCount(){
        try{
            $con = $this->mysqliConnection();
            $result = $con->query("SELECT * FROM member");
            $row_cnt = $result->num_rows;
            $result->close();
            $con->close();

            return $row_cnt;
        }catch (Exception $e){
            die('Error - Cannot get members row count: ' . $e->getMessage());
        }
    }

    #count partners
    protected function partnersCount(){
        try{
            $con = $this->mysqliConnection();
            $result = $con->query("SELECT * FROM partners");
            $row_cnt = $result->num_rows;
            $result->close();
            $con->close();

            return $row_cnt;
        }catch (Exception $e){
            die('Error - Cannot get members row count: ' . $e->getMessage());
        }
    }

    #count roles
    protected function usersCount(){
        try{
            $con = $this->mysqliConnection();
            $result = $con->query("Select * From users");
            $row_cnt = $result->num_rows;
            $result->close();
            $con->close();

            return $row_cnt;
        }catch (Exception $e){
            die('Error - cannot get users row count: ' .$e->getMessage());
        }
    }

    #count Partner Types
    protected function partnerTypesCount(){
        try{
            $con = $this->mysqliConnection();
            $result = $con->query("Select * From partner_types");
            $row_cnt = $result->num_rows;
            $result->close();
            $con->close();

            return $row_cnt;
        }catch (Exception $e){
            die('Error - cannot get partner types row count: ' .$e->getMessage());
        }
    }
} 