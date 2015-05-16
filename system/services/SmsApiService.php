<?php
  class SmsApiService extends BaseService
  {


      function __construct()
      {
          parent::__construct();
      }


      function getGroupContactsById($groupId){

          try{
              $query = "Select
                          c.phone
                        From
                          contacts c
                        WHERE
                          c.group =".$groupId;

              $stmt = $this -> getConnection($query);
              $stmt ->execute();
              $stmt ->bind_result($id, $name, $phone, $since);
              $result = array();
              while ($stmt -> fetch()) {
                  $result[] = array(
                      'phone' => $phone
                  );
              }
              $stmt->close();

              return $result;

          }catch (exception $e){
              die('Error - cannot retrieve user contact list: ' . $e -> getMessage());
          }
      }

      function getContactById($contactId){

          try{
              $query = "Select
                          c.phone
                        From
                          contacts c
                        WHERE
                          c.id =".$contactId;
              $stmt = $this -> getConnection($query);
              $stmt ->execute();
              $stmt ->bind_result($id, $name, $phone, $since);
              $result = array();
              while ($stmt -> fetch()) {
                  $result[] = array(
                      'phone' => $phone
                  );
              }
              $stmt->close();

              return $result;

          }catch (exception $e){
              die('Error - cannot retrieve user contact list: ' . $e -> getMessage());
          }
      }

      //get unsend smses from Db
      function prepareSendRequest($numberOfSms)
      {
          try{
              $query = "Select
                          m.sender,
                          m.text,
                          m.contact_id,
                          m.group_id
                        From
                          messages m
                        WHERE m.status = 'not sent' limit " .$numberOfSms;

              $stmt = $this -> getConnection($query);
              $stmt ->execute();
              $stmt ->bind_result($sender, $text, $contact_id, $group_id);
              $result = array();
              while ($stmt -> fetch()) {
                  $result[] = array(
                      'sender' => $sender,
                      'text' => $text,
                      'contact_id' => $contact_id,
                      'group_id' => $group_id
                  );
              }
              $stmt->close();

              return $result;

          }catch (exception $e){
              die('Error - cannot retrieve user contact list: ' . $e -> getMessage());
          }

      }
  }

?>