<?php
/**
 * @Project: mTrack Bulk sms.
 * @Author: ogegoe
 * @Copyright: Copyright (c) 2015. All Rights Reserved.
 */

    class ContactService extends BaseService{
        function __construct(){
            parent::__construct();
        }

        #CRUD functions
        public function insertContact($name, $phone, $group){
            try{
                $last_id = 0;
                $sql = "INSERT INTO contacts (cname, phone, cgroup, created_at) VALUES(?,?,?, now())";
                $stmt = $this->getConnection($sql);
                if(!$stmt){
                    die('Contact statement not prepared');
                }else{
                    $stmt ->bind_param('sss', $name, $phone, $group);
                    $stmt -> execute();
                    $stmt->store_result();
                    $last_id = $stmt->insert_id;
                    $stmt -> close();
                }

                if(true){
                    echo 'New contact record created successfully.';
                }

                return $last_id;
            }catch (Exception $e){
                die('Contact insertion error' . $e ->getMessage());
            }
        }

        public function getContactList(){
            try{
                $query = "Select id, cname, phone, created_at FROM contacts ORDER BY id ASC ";
                $stmt = $this -> getConnection($query);
                $stmt ->execute();
                $stmt ->bind_result($id, $name, $phone, $since);
                $result = array();
                while ($stmt -> fetch()) {
                    $result[] = array(
                        'id' => $id,
                        'name' => $name,
                        'phone' => $phone,
                        'since' => $since
                    );
                }
                $stmt->close();

                return $result;
            }catch (exception $e){
                die('Error - cannot retrieve user contact list: ' . $e -> getMessage());
            }
        }

        public function searchContact(){
            try{
                $query = "Select id, cname FROM contacts ORDER BY id ASC ";
                $stmt = $this -> getConnection($query);
                $stmt ->execute();
                $stmt ->bind_result($id, $name);
                $result = array();
                while($stmt->fetch()){
                    $result[] = array(
                    'id' => $id,
                    'name' => $name
                );
                }
                $stmt->close();

                return $result;
            }catch (exception $e){
                die('Error - cannot retrieve user contact list: ' . $e -> getMessage());
            }
        }

        public function searchGroup(){
            try{
                $query = "Select id, name FROM groups ORDER BY id ASC ";
                $stmt = $this -> getConnection($query);
                $stmt ->execute();
                $stmt ->bind_result($id, $name);
                $result = array();
                while($stmt->fetch()){
                    $result[] = array(
                    'id' => $id,
                    'name' => $name
                );
                }
                $stmt->close();

                return $result;
            }catch (exception $e){
                die('Error - cannot retrieve user contact list: ' . $e -> getMessage());
            }
        }

        public function getContactById($id){
            try{
                $query = "SELECT cname FROM contacts WHERE id = ?"; //Select users.fname, users.lname, roles.title, roles.id, users.email, users.created_at, users.status From roles Join users On roles.id = users.role_id Where users.id = ? Limit 1
                $stmt = $this->getConnection($query);
                $stmt -> bind_param('i', $id);
                $stmt -> execute();
                $stmt -> bind_result($cname);
                $stmt->fetch();
                $user[] = array(
                    'cname' => $cname
                );
                $stmt -> close();

                return $user;
            }catch (Exception $e){
                die('Error - cannot get user by id: ' . $e -> getMessage());
            }
        }

        protected function insertGroup($name, $descr){
            try{
                $sql = "INSERT INTO groups (gname, description, created_at) VALUES(?,?, now())";
                $stmt = $this->getConnection($sql);
                if(!$stmt){
                    die('Contact statement not prepared');
                }else{
                    $stmt ->bind_param('ss', $name, $descr);
                    $stmt -> execute();
                    $stmt -> close();
                }

                if(true){
                    echo 'New group record created successfully';
                }
            }catch (Exception $e){
                die('Contact insertion error' . $e ->getMessage());
            }
        }

        public function getGroupList(){
            try{
                $query = "Select id, gname, description FROM groups ORDER BY id ASC ";
                $stmt = $this -> getConnection($query);
                $stmt ->execute();
                $stmt ->bind_result($id, $name, $descr);
                $result = array();
                while ($stmt -> fetch()) {
                    $result[] = array(
                        'id' => $id,
                        'name' => $name,
                        'descr' => $descr
                    );
                }
                $stmt->close();

                return $result;
            }catch (exception $e){
                die('Error - cannot retrieve user contact group list: ' . $e -> getMessage());
            }
        }

        protected function getGroupById($gid){
            try{
                $query = "Select id, name, created_at FROM groups WHERE id = ? ORDER BY id ASC ";
                $stmt = $this -> getConnection($query);
                $stmt -> bind_param("i", $gid);
                $stmt ->execute();
                $stmt ->bind_result($id, $name, $since);
                $result = array();
                while ($stmt -> fetch()) {
                    $result[] = array(
                        'id' => $id,
                        'name' => $name,
                        'since' => $since
                    );
                }
                $stmt->close();

                return $result;
            }catch (Exception $e){
                die('Error - cannot retrieve user by that Id');
            }
        }
    }