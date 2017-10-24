<?php

  /*
   * Project    : EIS Login Module
   * EAO IT Services Pvt. Ltd. | www.eaoservices.com
   * Copyright reserved @2017

   * File Description :

   * Created on : 13 Jul, 2017 | 5:56:05 PM
   * Author     : Bilal Wani
   * Email      : bilal.wani@eaoservices

   */
  require_once './../config.php';
  require_once './../common/log-class.php';
  require_once './../common/messages.php';
  require_once './../model/user-model.php';

  global $g_db_config;

  class TestEisUserModel {

      private $o_userModel = null;

      public function __construct() {
          global $g_db_config;
          $this->o_userModel = new EisUserModel($g_db_config['server'], $g_db_config['user'], $g_db_config['password']
                  );
      }
      
       public function TestCreateDb(){
         echo "ret value = " . $this->o_userModel->CreateDb("eis_crm");
      }
      
      public function TestSelectDb(){
         echo __FUNCTION__ ." ret value = " . $this->o_userModel->SelectDb("eis_crm");
      }
      
      public function TestCreateUserTable() {
          if( $this->o_userModel->CreateUserTable()){
              echo EisUserMessage::$USER_TABLE_CREATED;
          }else{
              echo $this->o_userModel->GetErrorMsg();
          }
      }
      public function TestGetUserById() {
          $data = $this->o_userModel->GetUserById(51);
          
          echo "<br> count = " . sizeof($data) ;
          if($data == null){
              echo "<br> No data found.";
          }else{
              echo "<BR>";
              var_dump($data);
              echo "<br>First Name : " . $data[0]['fname'];       
     }
          
      }

      public function TestCreateUser() {
          $objUserData = new UserDataTemplate();

          $ud = [
              'id' => null,
              'fname' => 'Bilal',
              'lname' => 'Wani',
              'gender' => 'male',
              'mobile' => '9008320449',
              'email' => 'bilal@eao.com',
              'dor' => '25-Jul-2017',
              'userid' => 'bilalwani',
              'pwd' => 'test',
              'status' => 'active'
          ];
          $objUserData->user_data = $ud;

          if ( $this->o_userModel->CreateUser($objUserData) ) {
              echo $this->o_userModel->GetErrorMsg();
          }
          echo "User Created Successfully";
      }

      public function TestDeleteUser($id) {
          $result = $this->o_userModel->DeleteUser($id);
          if  (($this->o_userModel->GetErrorNum() == 0 ) && ($result) ) {
          //    echo $this->o_userModel->DeleteUser($id);
              echo "<br>".EisUserMessage::$USER_DELETED . "<br>";
   //         echo $this->o_userModel->GetErrorMsg();
  //          echo "<br>" . $this->o_userModel->GetErrorNum();
          } else {
              echo "<br>" .EisUserMessage::$USER_ID_INVALID . "<br>";
              echo $this->o_userModel->GetErrorMsg();
              
          }
      }
        public function TestDeleteUserTable() {
          if ( $this->o_userModel->DeleteUserTable() ) {
              echo EisUserMessage::$USER_TABLE_DELETED;
          } else {
              echo EisUserMessage::$USER_TABLE_DELETE_ERROR ."<BR>";
              if ( $this->o_userModel->GetErrorNum() ) {
                  echo $this->o_userModel->GetErrorMsg();
              }
          }
      }
      
      public function TestCreateAddressTable() {
          if( $this->o_userModel->CreateAddressTable()){
              echo EisUserMessage::$ADDRESS_TABLE_CREATED;
          }else{
              echo $this->o_userModel->GetErrorMsg();
          }
      }
      
       public function TestCreateAddress() {
          $objAddressData = new AddressDataTemplate();

          $ad = [
                 'ID' =>  7,
                 'town' => 'kulgam',
                 'city' => 'MET Road',
                 'state' => 'J&K',
                 'country' => 'India',
                 'pin' => '190007'
          ];
          
          $objAddressData->address_data = $ad;

          if ( $this->o_userModel->CreateAddress($objAddressData) ) {
              echo $this->o_userModel->GetErrorMsg();
          }
           echo "<br>";
          echo "Address values Created Successfully";
      }
      
    
      public function TestDeleteAddress($id) {
          $result = $this->o_userModel->DeleteAddress($id);
          if  (($this->o_userModel->GetErrorNum() == 0 ) && ($result) ) {
          //    echo $this->o_userModel->DeleteAddress($id);
              echo "<br>".EisUserMessage::$ADDRESS_DELETED . "<br>";
   //         echo $this->o_userModel->GetErrorMsg();
  //          echo "<br>" . $this->o_userModel->GetErrorNum();
          } else {
              echo "<br>" .EisUserMessage::$ADDRESS_ID_INVALID . "<br>";
              echo $this->o_userModel->GetErrorMsg();
              
          }
      }
       public function TestDeleteAddressTable() {
          if ( $this->o_userModel->DeleteAddressTable() ) {
              echo EisUserMessage::$ADDRESS_TABLE_DELETED;
          } else {
              echo EisUserMessage::$ADDRESS_TABLE_DELETE_ERROR ."<BR>";
              if ( $this->o_userModel->GetErrorNum() ) {
                  echo $this->o_userModel->GetErrorMsg();
              }
          }
      }
       public function TestGetUserIdByEmail() {
       // $email="rubeena@eaoservices.com";
          $email = "bilal@eao.com";

        echo "<br>";
        echo __FUNCTION__ . " ret user-id = " . $this->o_userModel->GetUserIdByEmail($email);
    }

       public function TestUpdateMobile() {
        $id = 31;
        $number = '8988887898';
        echo "<br>";
        echo __FUNCTION__ . " ret value = " . $this->o_userModel->UpdateMobile($id, $number);
       }
      public function TestUpdateAddress() {
        $id = 2;
        $address = 'pampore';
        echo "<br>";
        echo __FUNCTION__ . " ret value = " . $this->o_userModel->UpdateAddress($id, $address);
      }
     public function TestAuthenticateUser() {
    $userid = 'bilalwani';
    $password = 'test';
    echo "<br>";
        echo __FUNCTION__ . " ret value = " . $this->o_userModel->AuthenticateUser($userid, $password);
    
}
      
  }

  
  /*
   * Main Section
   */
  try {
     $objTest = new TestEisUserModel();
     $objTest->TestSelectDb();
  // $objTest->TestCreateUserTable();
  // $objTest->TestCreateUser();
  // $objTest->TestDeleteUser(12);
  // $objTest->TestDeleteUserTable();
   $objTest->TestCreateAddressTable();
  // $objTest->TestGetUserById();
  // $objTest->TestCreateAddress();
   //  $objTest->TestDeleteAddress(2);
   //$objTest->TestDeleteAddressTable();
  // $objTest->TestAuthenticateUser();    
  } 
  catch (Exception $ex) {
      echo "Something went wrong! Exception Error Message : " . $ex->getMessage();
  }
  

