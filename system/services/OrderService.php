<?php

class OrderService extends BaseService {
    function __construct(){
        parent::__construct();
    }

    #insert sms order
    protected function insertOrder($type, $client, $units, $payment){
        try{
            $query = "INSERT INTO orders (client, type, units, payment, created_at) VALUES(?,?,?,?, now())";
            $stmt = $this->getConnection($query);
            if(!$stmt){
                echo'Statement not prepared!';
            }else{
                $stmt -> bind_param('ssss', $client, $type, $units, $payment);
                $stmt -> execute();
                $stmt -> close();
            }

            if(true)echo'New order record successfully created';

        }catch (Exception $e){
            die('Cannot insert order record');
        }
    }

    #Get orders
    protected function getOrders(){
        try{
            $query = "SELECT id, type, client, payment FROM orders";
            $stmt = $this->getConnection($query);
            $stmt -> execute();
            $stmt -> bind_result($id, $type, $client, $payment);
            $result = array();
            while($stmt->fetch()){
                $result[] = array(
                    'id' => $id,
                    'type' => $type,
                    'client' => $client,
                    'payment' => $payment
                );
            }
            $stmt -> close();

            return $result;
        }catch(Exception $e){
            die('Cannot get order list from the db');
        }
    }

    #insert allocations


    #insert sms order
    protected function insertAllocation($item, $units, $client){
        try{
            $query = "INSERT INTO allocation (item, units, client, created_at) VALUES(?,?,?, now())";
            $stmt = $this->getConnection($query);
            if(!$stmt){
                echo'Statement not prepared!';
            }else{
                $stmt -> bind_param('sii', $item, $units, $client);
                $stmt -> execute();
                $stmt -> close();
            }

            if(true)echo'New allocation record successfully created';

        }catch (Exception $e){
            die('Cannot insert order record');
        }
    }

} 