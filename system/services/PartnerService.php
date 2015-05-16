<?php
/**
 * @Project: mTrack Bulk sms.
 * @Author: ogegoe
 * @Copyright: Copyright (c) 2015. All Rights Reserved.
 */
class PartnerService extends BaseService{
    function __construct(){
        parent::__construct();
    }

    #insert new partner
    public function insertOrg($name, $type, $mobile, $email, $pwd, $salt, $role){
        try{
            $id = 0;
            $query = "INSERT INTO organisation (oname, otype, mobile, email, password, salt, role, created_at)
                      VALUES(?,?,?,?,?,?,?, now())";
            $stmt = $this -> getConnection($query);
            if($stmt){
                $stmt -> bind_param('sssssss', $name, $type, $mobile, $email, $pwd, $salt, $role);
                $stmt -> execute();
                $stmt -> store_result();
                $id = $stmt->insert_id;
                $stmt -> close();
            }else{
                echo 'Statement not prepared.';
            }

            if(true){
                return $id;
            }
        }catch(Exception $e){
            die('Organisation insertion error: ' . $e -> getMessage());
        }
    }

    #get partners' list
    function getPartnerList(){
        try{
            $query = "Select id, oname, mobile, contact_person, person_phone, role, created_at from organisation order by id desc";
            $stmt = $this -> getConnection($query);
            $stmt ->execute();
            $stmt ->bind_result($id, $bname, $phone, $person, $person_no, $role, $since);
            $result = array();
            while ($stmt -> fetch()) {
                $result[] = array(
                    'id' => $id,
                    'bname' => $bname,
                    'bphone' => $phone,
                    'person' => $person,
                    'cphone' => $person_no,
                    'role' => $role,
                    'since' => $since
                );
            }
            $stmt->close();

            return $result;
        }catch (exception $e){
            die('Error: Cannot get the  partner list -  ' . $e -> getMessage());
        }
    }

    #Get partner by id
    protected function getPartnerById($partnerId){
        try{
            $query = "Select
                          organisation.id,
                          organisation.oname,
                          organisation.otype,
                          organisation.mobile,
                          organisation.email,
                          organisation.role,
                          organisation.contact_person,
                          organisation.person_phone,
                          organisation.created_at,
                          organisation.updated_at,
                          organisation.person_email,
                          organisation.person_created_at,
                          organisation.person_updated_at
                       From
                          organisation
                       WHERE
                          organisation.id = ?";
            $stmt = $this->getConnection($query);
            $stmt -> bind_param('i', $partnerId);
            $stmt -> execute();
            $stmt -> bind_result($id, $pname, $ptype, $pmobile, $pemail, $prole, $cperson, $cphone, $pcat, $pupat, $cemail, $since, $updated);
            $stmt -> fetch();
            $partner[] = array(
                'id' => $id,
                'biz' => $pname,
                'biz_type' => $ptype,
                'biz_mobile' => $pmobile,
                'biz_email' => $pemail,
                'biz_role' => $prole,
                'contact' => $cperson,
                'contact_phone' => $cphone,
                'contact_since' => $pcat,
                'contact_update' => $pupat,
                'contact_email' => $cemail,
                'biz_since' => $since,
                'biz_update' => $updated,
            );
            $stmt -> close();

            return $partner;
        }catch (Exception $e){
            die('Error - Cannot retrieve user details ' . $e -> getMessage());
        }
    }

    #update partner
    protected function updateOrganisation($id, $biz, $biz_phone, $contact, $contact_phone, $contact_email){
        try{
            $query = "UPDATE
                          organisation
                      SET
                          organisation.oname = '$biz',
                          organisation.mobile = '$biz_phone',
                          organisation.contact_person = '$contact',
                          organisation.person_phone = '$contact_phone',
                          organisation.person_email = '$contact_email',
                      WHERE
                          organisation.id = '$id'";
            $stmt = $this->getConnection($query);
            if($stmt){
                echo 'Success! Partner record updated.';
            }else{
                echo 'Error: (' . $stmt->errno .')' . $stmt->error;
            }
            $stmt->close();

        }Catch(Exception $e){
            die('Error - Oops! Cannot update partner details. Check your code!: ' . $e -> getMessage());
        }
    }

}
