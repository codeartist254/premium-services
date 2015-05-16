<?php
/**
 * @Project: mTrack Bulk sms.
 * @Author: ogegoe
 * @Copyright: Copyright (c) 2015. All Rights Reserved.
 */

class UserService extends BaseService{
    function __construct(){
        parent::__construct();
    }

    #CRUD
    /**
     * CREATE: ADD users
     *
     * @param $fname
     * @param $lname
     * @param $role_id
     * @param $email
     * @param $phone
     * @param $pwd
     * @param $salt,
     * @param $status
     */
    public function insertUser($fname, $lname = null, $role_id = null, $phone = null, $email=null, $pwd=null, $salt=null, $status=null){
        try{
            $query = "INSERT INTO users (fname, lname, phone, role_id, email, password, salt, created_at, status)
                      VALUES(?,?,?,?,?,?,?, now(), ?)";
            $stmt = $this -> getConnection($query);
            if($stmt){
                $stmt -> bind_param('ssssssss', $fname, $lname, $phone, $role_id, $email, $pwd, $salt, $status);
                $stmt -> execute();
                $stmt -> close();
            }else{
                echo 'Statement not prepared.';
            }

            if(true){
                echo 'New record created successfully.';
            }
        }catch(Exception $e){
            die('User insertion error: ' . $e -> getMessage());
        }
    }

    /**
     * READ: GET user by EMAIL
     *
     * @param $mail
     * @return array|bool|null
     */
    protected function getOrgByMail($mail){
        $user = null;
        try{
            $qry = "SELECT id, email, password, salt FROM organisation WHERE email = ?";
            $stmt = $this->getConnection($qry);
            $stmt -> bind_param("s", $mail);
            $stmt->execute();
            $stmt->bind_result($id, $email, $password, $salt);
            $stmt->fetch();
            $org = array(
                'id' => $id,
                'username' => $email,
                'password' => $password,
                'salt' => $salt
            );
            $stmt->close();

            return $org;
        }catch (Exception $e){
            die('Error - cannot get organisation by mail: ' . $e->getMessage());
        }
    }

    /**
     * READ: GET user by id
     */
    public function getUserOne(){
        try{
            $query = "Select id, fname, lname, phone, role_id, email, created_at, status From users ORDER BY id desc LIMIT 1";
            $stmt = $this->getConnection($query);
            $stmt -> execute();
            $stmt -> bind_result($id, $fname, $lname, $phone, $role, $email, $date, $status);
            $stmt->fetch();
            $user[] = array(
                'id' => $id,
                'fname' => $fname,
                'lname' => $lname,
                'phone' => $phone,
                'role' => $role,
                'email' => $email,
                'date' => $date,
                'status' => $status
            );
            $stmt -> close();
            return $user;
        }catch (Exception $e){
            die('Error -  cannot retrieve single user: ' . $e -> getMessage());
        }
    }

    /**
     * READ: GET user by ID
     *
     * @param $id
     * @return array|bool
     */
    public function getUserById($id){
        try{
            $query = "SELECT fname, lname, fullname, email, role_id FROM users WHERE ID = ?"; //Select users.fname, users.lname, roles.title, roles.id, users.email, users.created_at, users.status From roles Join users On roles.id = users.role_id Where users.id = ? Limit 1
            $stmt = $this->getConnection($query);
            $stmt -> bind_param('i', $id);
            $stmt -> execute();
            $stmt -> bind_result($fname, $sname, $fullname, $email, $role);
            $stmt->fetch();
            $user[] = array(
                'fname' => $fname,
                'sname' => $sname,
                'fullname' => $fullname,
                'email' => $email,
                'role' => $role
            );
            $stmt -> close();

            return $user;
        }catch (Exception $e){
            die('Error - cannot get user by id: ' . $e -> getMessage());
        }
    }

    /**
     * READ: DISPLAYING full list
     * @return array
     */
    function getUserList(){
        try{
            $query = "Select id, fname, lname, email, phone, created_at FROM users ORDER BY id DESC";
            $stmt = $this -> getConnection($query);
            $stmt ->execute();
            $stmt ->bind_result($id, $fname, $lname, $email, $phone, $since);
            $result = array();
            while ($stmt -> fetch()) {
                $result[] = array(
                    'id' => $id,
                    'fname'=>$fname,
                    'lname'=>$lname,
                    'email' => $email,
                    'phone' => $phone,
                    'since' => $since
                );
            }
            $stmt->close();
            
            return $result;
        }catch (exception $e){
            die('Error - cannot retrieve user list: ' . $e -> getMessage());
        }
    }

    /**
     * Get User with admin Roles using logged in user id
     *
     * @param $uid
     */
    public function getUserRole($uid){
        try{
            $query ="Select roles.title From roles Join users On roles.id = users.role_id Where users.id = ? Limit 1";
            $stmt = $this->getConnection($query);
            $stmt->bind_param('i', $uid);
            $stmt->execute();
            $stmt->bind_result($role);
            $stmt->fetch();
            $user[] = array(
                'role' => $role
            );

            return $user;
        }catch(Exception $e){
            die("Cannot get the admin");
        }
    }

    public function getOrgById($id){
        try{
            $query = "Select oname, otype, mobile, email, role FROM organisation WHERE id = ?"; //Select organisation.role  From organisation WHERE organisation.id = ?
            $stmt = $this->getConnection($query);
            $stmt -> bind_param('i', $id);
            $stmt -> execute();
            $stmt -> bind_result($name, $type, $mobile, $email, $role);
            $stmt->fetch();
            $org[] = array(
                'name' => $name,
                'type' => $type,
                'mobile' => $mobile,
                'email' => $email,
                'role' => $role
            );
            $stmt -> close();

            return $org;
        }catch (Exception $e){
            die('Error - cannot get organisation by id: ' . $e -> getMessage());
        }
    }

    /**
     *  UPDATE user details
     *
     * @param $id
     * @param $fname
     * @param $sname
     * @param $role_id
     * @param $email
     */
    protected function editUser($id, $fname, $sname, $role_id, $email){
        try{
            $query = "UPDATE users SET first_name = ?, last_name = ?, role_id = ?, email = ?, updated_at = now() WHERE id = " .$id;
            $stmt = $this->getConnection($query);
            $stmt -> bind_param('ssis', $fname, $sname, $role_id, $email);
            $stmt -> execute();
            $stmt -> close();

            return true;
        }Catch(Exception $e){
            die('Error - User update error: ' . $e -> getMessage());
        }
    }

    /**
     *  Add user profile photo
     *
     * @param $id
     * @param $photo
     */
    protected function insertPhoto($id, $photo){
        try{
            $query = "UPDATE users SET photo = ?, updated_at = now() WHERE id = " .$id;
            $stmt = $this->getConnection($query);
            $stmt -> bind_param('s', $photo);
            $stmt -> execute();
            $stmt -> close();

            return true;
        }Catch(Exception $e){
            die('Error - User photo update error: ' . $e -> getMessage());
        }
    }

    /**
     * Get user photo by user id
     *
     * @param $id
     */
    protected function getPhoto($id){
        try{
            $query = "Select users.photo From users Where users.id = ?";
            $stmt = $this->getConnection($query);
            $stmt -> bind_param('i', $id);
            $stmt -> execute();
            $stmt -> bind_result($photo);
            $stmt->fetch();
            $userPhoto[] = array(
                'photo' => $photo
            );
            $stmt -> close();

            return $userPhoto;
        }catch (Exception $e){
            die('Error - cannot get user photo: ' . $e -> getMessage());
        }
    }

    /**
     * DELETE user
     * @param $id
     * @return bool
     */
    protected function deleteUser($id){
        try{
            $query = "DELETE * FROM users WHERE id = ?";
            $stmt = $this -> getConnection($query);
            $stmt -> bind_param('s', $id);
            $stmt -> execute();
            $stmt -> close();

            return true;
        }catch (Exception $e){
            die('Error - deletion error: ' . $e -> getMessage());
        }
    }

    /**
     *READ: GET current status using user id
     *
     * @param $userId
     */
    protected function getStatus($userId){
        try{
            $query = "SELECT status FROM users WHERE id = ?";
            $stmt = $this->getConnection($query);
            $stmt->bind_param('i', $userId);
            $stmt->execute();
            $stmt->bind_result($status);
            $stmt->fetch();
            $aggStatus[] = array(
                'status' => $status
            );
            $stmt->close();

            return $aggStatus;
        }catch(Exception $e){
            die('Error - Cannot get the aggregator status');
        }
    }

    /**
     * UPDATE User status
     *
     * @param $userId
     * @param $status
     */
    protected function updateStatus($userId, $status){
        try{
            $query = "UPDATE users SET status=? WHERE id = " .$userId;
            $stmt = $this->getConnection($query);
            $stmt -> bind_param('i', $status);
            $stmt -> execute();
            $stmt -> close();

            return true;
        }catch(Exception $e){
            die('Error - Cannot update aggregator status: ' .$e->getMessage());
        }
    }

    /**
     * UPDATE user password
     *
     * @param $id
     * @param $salt
     * @param $pwd
     */
    protected function updatePassword($id, $salt, $pwd){
        try{
            $query = "UPDATE users SET password = ?, salt = ? WHERE id = " .$id;
            $stmt = $this->getConnection($query);
            $stmt ->bind_param('ss', $pwd, $salt);
            $stmt->execute();
            $stmt->close();

            return true;
        }catch (Exception $e){
            die('ERROR - Cannot update user password' .$e->getMessage());
        }
    }


    #AUXILLIARY FUNCTIONS
    /**
     * Matching the encrypted password and the input password
     *
     * @param $email
     * @param $pwd
     */
    protected function matchPwd($email, $pwd){
        try{
            $user = $this->getOrgByMail($email);
            $result = false;
            if (isset($user['password'],$user['id'])) {
                $salt = $user['salt'];
                $encryption = $user['password'];
                $hash = $this->checkHash($salt, $pwd);
                if ($hash === $encryption) {
                    return $user;
                }
            }
            return $result;
        }catch (Exception $e){
            die('Error -  wrong password!: ' . $e->getMessage());
        }
    }

    /**
     *  Get image extension
     *
     * @param $str
     * @return string
     */
    protected function getExtension($str){
        $i = strrpos($str, ".");
        if(!$i)return "";
        $length = strlen($str) - $i;
        $ext = substr($str, $i+1, $length);

        return $ext;
    }

    public function resetPwd($pwd, $salt){
        try{
            $query = "INSERT INTO organisation ( password, salt, updated_at)
                      VALUES(?,?, now())";
            $stmt = $this -> getConnection($query);
            if($stmt){
                $stmt -> bind_param('ss', $pwd, $salt);
                $stmt -> execute();
                $stmt -> close();
            }else{
                echo 'Statement not prepared.';
            }

            if(true){
                echo 'Password updated successfully.';
            }
        }catch(Exception $e){
            die('Organisation password update error: ' . $e -> getMessage());
        }
    }
}