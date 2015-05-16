<?php
/**
 * @Project: mTrack Bulk sms.
 * @Author: ogegoe
 * @Copyright: Copyright (c) 2015. All Rights Reserved.
 */

class MessageService extends BaseService{
    function __construct(){
        parent::__construct();
    }

    #CRUD functions4
    protected function insertMsg($msg, $from, $to, $group, $status){
        try{
            $query = "INSERT INTO messages (text, sender, receiver, group_id, status, created_at) VALUES(?,?,?,?,?,now())";
            $stmt = $this -> getConnection($query);
            if($stmt){
                $stmt -> bind_param('sssss', $msg, $from, $to, $group, $status);
                $stmt -> execute();
                $stmt -> close();
            }else{
                echo 'Statement not prepared.';
            }
            if(true){
                echo 'New record created successfully';
            }
        }catch(Exception $e){
            die('Message insertion error: ' . $e -> getMessage());
        }
    }

    protected function getMsgs(){
        try{
            $query = "Select id, text, sender, receiver, status, created_at FROM messages ORDER BY id DESC";
            $stmt = $this -> getConnection($query);
            $stmt ->execute();
            $stmt ->bind_result($id, $msg, $from, $to, $status, $when);
            $result = array();
            while ($stmt -> fetch()) {
                $result[] = array(
                    'id' => $id,
                    'msg'=>$msg,
                    'sender'=>$from,
                    'receiver' => $to,
                    'status' => $status,
                    'date' => $when
                );
            }
            $stmt->close();

            return $result;
        }catch (exception $e){
            die('Error - cannot retrieve messages list: ' . $e -> getMessage());
        }

    }

    protected function getMsgById($mId){
        try{
            $query = "Select id, text, sender, receiver, status, created_at FROM messages WHERE id = ?";
            $stmt = $this -> getConnection($query);
            $stmt -> bind_param('i', $mId);
            $stmt ->execute();
            $stmt ->bind_result($id, $msg, $from, $to, $status, $when);
            $result = array();
            while ($stmt -> fetch()) {
                $result[] = array(
                    'id' => $id,
                    'msg'=>$msg,
                    'sender'=>$from,
                    'receiver' => $to,
                    'status' => $status,
                    'date' => $when
                );
            }
            $stmt->close();

            return $result;
        }catch (exception $e){
            die('Error - cannot retrieve messages list: ' . $e -> getMessage());
        }

    }

    protected function getMsgByStatus($status){#TODO: Use this to work on all the counters
        try{
            $query = "Select id FROM messages WHERE status = ?";
            $stmt = $this -> getConnection($query);
            $stmt -> bind_param("s", $status);
            $stmt ->execute();
            $stmt ->bind_result($id);
            $result = array();
            while ($stmt -> fetch()) {
                $result[] = array(
                    'id' => $id
                );
            }
            $stmt->close();

            return $result;
        }catch (exception $e){
            die('Error - cannot retrieve messages by status: ' . $e -> getMessage());
        }

    }

    protected function editMsg($id){

    }

    protected function deleteMsg($id){

    }
}