<?php
/**
 * @Project: mTrack Bulk sms.
 * @Author: ogegoe
 * @Copyright: Copyright (c) 2015. All Rights Reserved.
 */

class RoleService extends BaseService{
    function __construct(){
        parent::__construct();
    }


    #CRUD
    /**
     * CREATE: ADD new role
     *
     * @param $title
     * @param $status
     */
    protected function insertRole($title, $status){
        try{
            $qry = "INSERT INTO roles (title, status, created_at)
            VALUES(?,?, now())";
            $stmt = $this->getConnection($qry);
            if($stmt){
                $stmt -> bind_param('ss', $title, $status);
                $stmt -> execute();
                $stmt -> close();
            }else{
                echo 'Statement not prepared';
            }
        }catch (Exception $e){
            die('Error - cannot insert role: ' . $e -> getMessage());
        }
    }

    /**
     * READ: GET roles
     */
    public function getRoleList(){
        try{
            $query = "Select id, title, created_at From roles";
            $stmt = $this -> getConnection($query);
            $stmt ->execute();
            $stmt ->bind_result($id, $title, $since);
            $result = array();
            while ($stmt -> fetch()) {
                $result[] = array(
                    'id' => $id,
                    'role_title' => $title,
                    'since' => $since
                );
            }
            $stmt->close();
            return $result;
        }catch (exception $e){
            die('Error: ' . $e -> getMessage());
        }
    }

    /**
     * READ: GET Role by ID
     *
     * @param $roleId
     */
    protected function getRoleById($roleId){
        try{
            $query = "Select
                          roles.id
                          organisation.role,
                          organisation.oname,
                          roles.title
                        From
                          organisation
                        Inner Join
                          roles
                        On roles.id = organisation.role
                        Where roles.id = ?";
            $stmt = $this->getConnection($query);
            $stmt -> bind_param('i', $roleId);
            $stmt -> execute();
            $stmt -> bind_result($id, $title, $since, $status);
            $stmt -> fetch();
            $role[] = array(
                'id' => $id,
                'title' => $title,
                'since' => $since,
                'status' => $status
            );
            $stmt -> close();

            return $role;
        }catch (Exception $e){
            die('Error - Cannot retrieve role details ' . $e -> getMessage());
        }
    }
}
