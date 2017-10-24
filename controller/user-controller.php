<?php
/*
 * Project    : EIS Login Module
 * EAO IT Services Pvt. Ltd. | www.eaoservices.com
 * Copyright reserved @2017

 * File Description :

 * Created on : 13 Jul, 2017 | 4:52:51 PM
 * Author     : Bilal Wani
 * Email      : bilal.wani@eaoservices

 * History:
 * Author
 */
include_once '../config.php';
include_once '../model/user-model.php';
include_once '../common/messages.php';
require_once '../common/log-class.php';

session_start();
/*
 * Class: UserController
 * Description:
 *  This class provides functionality regarding User controller
 */


class UserController {

    private $objUserModel;

    public function __construct($server, $user, $password, $database) {
        $this->objUserModel = new EisUserModel($server, $user, $password, $database);
    }

    public function Dispatcher($message) {
        if (DebugMode()) {
            EisLog::Record("Begin Inside Dispatcher MSG ID : ". $message['msg_id'] . __LINE__);
        }
        
        $msg_id = $message["msg_id"];
        if ($this->objUserModel == null) {
            die("Unable to connect to database");
        }
        
        if(DebugMode()){
            var_dump($message);
        }
        
        switch ($msg_id) {
            case MSG_ID_USER_CREATE:
               
                //Create user
                $objUserData = new UserDataTemplate();

                $ud = [
                    'id' => null,
                    'fname' => $message['fname'],
                    'lname' => $message['lname'],
                    'gender' => $message['gender'],
                    'mobile' => $message['mobile'],
                    'email' => $message['email'],
                    'dor' => $message['dor'],
                    'userid' => $message['user_id'],
                    'pwd' => $message['pwd'],
                    'status' => 'active'
                ];
                
                $objUserData->user_data = $ud;

                $ret = $this->objUserModel->CreateUser($objUserData);
                if ($this->objUserModel->GetErrorNum() != 0) {
                    echo "<br> Unable create user <br>";
                    echo "Error: " . $this->objUserModel->GetErrorNum() . " : " . $this->objUserModel->GetErrorMsg() . "<br>";
                } else {

                    echo "<br> User created successfully <br>";
                }

                break;

               case MSG_ID_USER_UPDATE:

                //Modify user
                $uid = $message["user_id"];
                $mobile = $message["mobile"];

                //update mobile number
                $ret = $this->objUserModel->UpdateMobile($uid, $mobile);
                if ($ret == 0) {
                    echo "<br> No updates were done, <br>";
                    if ($this->objUserModel->GetErrorNum() != 0) {
                        echo "Error: " . $this->objUserModel->GetErrorMsg() . "<br>";
                    }
                } else {
                    echo "<br> Updated Successfully !!!<br>";
                }
                break;


            case MSG_ID_USER_DELETE:
                //Delete User
                $uid = $message["id"];
                $ret = $this->objUserModel->DeleteUser($uid);
                if ($ret == 0) {
                    echo "<br> No deletion were done <br>";
                } else {
                    echo "<br> Deleted  Successfully !!!<br>";
                }
                break;

            case MSG_ID_USER_DISPLAY:
                //Display User
                $email = $message["email"];
                echo "<br>";
                $ret = $this->objUserModel->GetUserIdByEmail($email);
                if ($ret == 0) {
                    echo "User_id not found";
                } else {
                    echo "User ID = " . $ret;
                }
                break;

            case MSG_ID_USER_CREATE_ADDRESS:
                //Create address
                $objUserAddress = new AddressDataTemplate();

                $ud = [
                    'id' => 51,
                    'town' => $message['town'],
                    'city' => $message['city'],
                    'state' => $message['state'],
                    'country' => $message['country'],
                    'pin' => $message['pin'],
                ];
                $objUserAddress->address_data = $ud;

                $ret = $this->objUserModel->CreateAddress($objUserAddress);
                if ($this->objUserModel->GetErrorNum() != 0) {
                    echo "<br> Unable create address <br>";
                    echo "Error: " . $this->objUserModel->GetErrorNum() . " : " . $this->objUserModel->GetErrorMsg() . "<br>";
                } else {

                    echo "<br> Address created successfully <br>";
                }

                break;

            case MSG_ID_USER_AUTHENTICATION:
                if (DebugMode()) {
                    EisLog::Record("Begin Inside MSG_ID_USER_AUTHENTICATION " . __LINE__);
                }
                $ret = $this->objUserModel->AuthenticateUser($message['userid'], $message['password']);

                if ($ret == 1){
                    //User authentical success
                    if(DebugMode()){
                        EisLog::Record("Begin Inside MSG_ID_USER_AUTHENTICATION " . __LINE__);
                        header("location: http://localhost/eis-login-module-sync/views/response-views/resp-user-login-view.php");
                        $_SESSION['user-id'] = $message['userid'];
                    }
                }            

                if (DebugMode()) {
                    EisLog::Record("Ends Inside MSG_ID_USER_AUTHENTICATION " . __LINE__);
                }
            break;
            
            case MSG_ID_USER_SEARCHBYID:
              $uid = $message["id"];
                echo "<br>";
                $data = $this->objUserModel->GetUserById($uid);
              
                echo "<br> count = " . sizeof($data) ;
                if($data == null){
                echo "<br> No data found.";
                }else{
                echo "<BR>";
                var_dump($data);
                echo "<br>First Name : ". $data[0]['fname'];
                echo "<br>Last Name : ". $data[0]['lname'];
                echo "<br>Gender :".$data[0]['gender'];
                echo "<br>Mobile No : ". $data[0]['mobile']; 
                echo "<br>Email : ". $data[0]['email'];
                echo "<br>Date of Registration : " . $data[0]['dor'];
                echo "<br>User Id : ". $data[0]['userid'];
                 
                } 
             break;
             
            case MSG_ID_USER_DELETEADDRESS:
               $uid = $message["id"];
                $ret = $this->objUserModel->DeleteAddress($uid);
                if ($ret == 0) {
                    echo "<br> no deletion were done<br>";
                } else {
                    echo "<br> Deleted  Successfully !!!<br>";
                }  
                 break;
             
            case  MSG_ID_USER_SEARCHUSERIDBYEMAIL:
                $uid = $message["email"];
                echo "<br>";
                $data = $this->objUserModel->GetUserIdByEmail($uid);
              
                echo "<br> count = " . sizeof($data) ;
                if($data == null){
                echo "<br> No data found.";
                }else{
                echo "<BR>";
                var_dump($data);
             
                echo "<br> User Id : ". $data[0]['userid'];
                 
                }   
             break;
             
            case  MSG_ID_USER_SEARCHUSERIDBYFNAME:
                $uid = $message["fname"];
                echo "<br>";
                $data = $this->objUserModel->GetUserIdByName($uid);
              
                echo "<br> count = " . sizeof($data) ;
                if($data == null){
                echo "<br> No data found.";
                }else{
                echo "<BR>";
                var_dump($data);
             
                echo "<br> User Id : ". $data[0]['userid'];
                 
                }    
                 break;
             
            case  MSG_ID_USER_SEARCHUSERLISTBYFNAME:
                $uid = $message["fname"];
                echo "<br>";
                $data = $this->objUserModel->SearchByFname($fname);
              
                echo "<br> count = " . sizeof($data) ;
                if($data == null){
                echo "<br> No data found.";
                }else{
                echo "<BR>";
                var_dump($data);
             
                echo "<br> User Id : ". $data[0]['userid'];
                 
                }
                break;
                
                case MSG_ID_USER_UPDATEADDRESS:

                $id = $message["id"];
                $town = $message["town"];
                $city = $message["city"];
                $state = $message["state"];
                $country = $message["country"];             
                $pin = $message["pin"];
                
                $ret = $this->objUserModel->UpdateAddress($id, $town,$city,$country,$pin);
                if ($ret == 0) {
                    echo "<br> No updates were done, <br>";
                    if ($this->objUserModel->GetErrorNum() != 0) {
                        echo "Error: " . $this->objUserModel->GetErrorMsg() . "<br>";
                    }
                } else {
                    echo "<br> Updated Successfully !!!<br>";
                }
            default :
        }
    } 

}
         // Main Section 
     if ($_SERVER["REQUEST_METHOD"] == 'GET') {
     global $g_db_config;

     $message = $_GET;

     try {
        $objUserController = new UserController($g_db_config['server'], $g_db_config['user'], $g_db_config['password'], $g_db_config['database']);
        if ($objUserController) {
            EisLog::Record("Begin calling dispatcher " . __LINE__);
            $objUserController->Dispatcher($message);
        }
     } catch (Exception $e) {
        echo "Error : " . $e->getMessage();
     }
 }

