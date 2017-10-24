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

require_once './../common/log-class.php';
require_once './../common/messages.php';
require_once './../common/user-interface.php';

/**
 *  The EisSqlDb Class 
 * Description: Wrapper class for MySql operations
 * Fields:
 * 1 - $m_link -  Connection variable
 * 2 - $msg_data  - Messsage data 
 */

if (!class_exists('EisSqlDb')) {

    class EisSqlDb {

        protected $m_link = null;
        private $m_error_msg;

        /*
         * @method Constructor establishes db connection using thegiven parameters: 
         * 
         * @param string $host,string $user,string $pwd and string $database
         * 
         * @author
         */

        public function __construct($host, $user, $pwd, $database = null) {
            $this->m_error_msg = null;
            try {
                if ($database) {
                    $this->m_link = new mysqli($host, $user, $pwd, $database);
                } else {
                    $this->m_link = new mysqli($host, $user, $pwd);
                }

                if (mysqli_connect_errno()) {
                    $this->m_error_msg = mysqli_connect_error();
                    throw new mysqli_sql_exception;
                }
            } catch (Exception $e) {
                echo "exception - " . $e->getMessage();
            }
        }

        /**
         * @method  Creates database
         * Description: Creates Database if not exists 
         * 
         * @param string $db_name
         * 
         * @return On success returns null and on failure returns error number
         * @author
         */

        public function CreateDb($db_name) {
            $query = "CREATE DATABASE IF NOT EXISTS $db_name";
            if (!$this->IsDbConnReady()) {
                $this->SetDbConnectionError();
                return null;
            }
            $this->m_link->query($query);
            if (!$this->m_link->errno) {
                $this->SelectDb($db_name);
            }
            EisLog::Record(__FUNCTION__ . " | SQL : " . $query, __FILE__);
            return $this->m_link->errno;
        }

        /**
         * @method selects dababase
         * Description: Seletes the Database
         * 
         * @param string $db_name
         * 
         * @return On success returns null and on failure returns error number
         * @author
         */

        public function SelectDb($db_name) {
            if (!$this->IsDbConnReady()) {
                $this->SetDbConnectionError();
                return null;
            }
            $this->m_link->select_db($db_name);

            return $this->m_link->errno;
        }

        /**
         * @method GetErrorMsg
         * Description: Get Error Message for last sql statement.
         * 
         * @return  Error message for sql statement 
         * @author
         */

        public function GetErrorMsg() {
            return $this->m_link->error;
        }

        /**
         * @method GetErrorNum
         * Description: Get Error number for last sql statement. 
         * 
         * @return  Error message for sql statement 
         * @author
         */

        public function GetErrorNum() {
            return $this->m_link->errno;
        }

        /**
         * @method ExecuteCUDQuery
         * Description: ExecuteCUDQuery Operates on CREATE,UPDATE,DELETE query
         * 
         * @params String $query
         * 
         * @returns On success runs else On error it returns 'null'
         * @author
         */

        public function ExecuteCUDQuery($query) {
            return $this->m_link->query($query);
        }

        /**
         * @method ExecuteSelectQuery
         * Description: ExecuteSelectQuery Operates on SELECT query
         * 
         * @params String $query
         * 
         * @returns  On success returns associative data array. Caller must check size of array for validation.
         * On error it returns 'null'
         * 
         * @author
         */

        public function ExecuteSelectQuery($query) {
            $result = $this->m_link->query($query);
            $dataArray = array();
            if ($result->num_rows > 0) {
                //output data of each row
                while ($row = $result->fetch_assoc()) {
                    array_push($dataArray, $row);
                }
            }
            return $dataArray;
        }

        /**
         * @method  IsDbConnReady
         * Description:  Checks  the database connection ready or not
         * 
         * @author
         */

        protected function IsDbConnReady() {
            return $this->m_link;
        }

        /**
         * @method  SetDbConnectionError
         * Description:  It sets the db connection Error
         * 
         * @author
         */

        protected function SetDbConnectionError() {
            $this->m_link->error = EisErrorMessage::$DB_NOT_CONNECTED;
        }

        /**
         * @method  GetRowsAffected
         * Description:  It sets the db connection Error
         * 
         * @author
         */

        public function GetRowsAffected() {
            return $this->m_link->affected_rows;
        }

    }

    // ends class EisMySqliDb
}


/**
 *  The EisUserModel Class 
 * Description: Wrapper class for MySql operations
 * 
 * 
 * 1 - $m_user_table -  
 * 2 - $m_user_attributes  -
 */

if (!class_exists("EisUserModel")) {

    class EisUserModel extends EisSqlDb {

        private $m_user_table = 'users';
        private $m_user_attributes = [
            'id' => 'ID',
            'fname' => 'fname',
            'lname' => 'lname',
            'gender' => 'gender',
            'mobile' => 'mobile',
            'email' => 'email',
            'dor' => 'dor',
            'userid' => '',
            'pwd' => '',
            'status' => ''
        ];
        private $m_address_table = 'address';
        private $m_address_attributes = [
            'id' => 'ID', //Reference user id
            'town' => 'town',
            'city' => 'city',
            'state' => 'state',
            'country' => 'country',
            'pin' => 'pin'
        ];

        public function __construct($host, $user, $pwd, $database = null) {
            parent::__construct($host, $user, $pwd, $database);
        }

        /**
         * @method  CreateMember
         * Description: Creates Member
         * 
         * @params var char $fname, var char $lname,var char $gender, var char $mobile,var char $email,var char $dor,var char $userid ,var char $pwd & var char $status
         * 
         * @returns On success return 0, else error code
         * 
         * @author 
         */

        public function CreateUserTable() {
            $query = "CREATE TABLE IF NOT EXISTS $this->m_user_table "
                    . " ( "
                    . "  ID INT PRIMARY KEY  AUTO_INCREMENT,"
                    . "  fname VARCHAR(40) ,"
                    . "  lname VARCHAR(40) ,"
                    . "  gender VARCHAR(10) ,"
                    . "  mobile VARCHAR(10) ,"
                    . "  email VARCHAR(100) ,"
                    . "  dor VARCHAR(20) ,"
                    . "  userid VARCHAR(40) UNIQUE NOT NULL,"
                    . "  pwd VARCHAR(255) ,"
                    . "  status VARCHAR(20)"
                    . " )";

            EisLog::Record(__FUNCTION__ . " | SQL : " . $query, __FILE__);
            return $this->ExecuteCUDQuery($query);
        }

        /**
         * @method DeleteUserTable
         * Description: This function Deletes User Table
         * 
         * @returns On success return 0, else error code
         * 
         * @author
         */

        public function DeleteUserTable() {
            $query = 'DROP TABLE ' . $this->m_user_table;
            EisLog::Record("SQL : " . $query . " | " . __FUNCTION__, __FILE__);
            return $this->ExecuteCUDQuery($query);
        }

        /**
         * Param 1 : Object of UserData Class (defined user-interface.php)
         *
         * Function: CreateUser
         * Description: Creates user
         * 
         *@params var char $fname, var char $lname,var char $gender, var char $mobile,var char $email,var char $dor,var char $userid ,var char $pwd & var char $status
         * 
         * @return On error return null, else some postive integer
         * 
         */

        public function CreateUser($objUserData) {
            if (is_object($objUserData)) {
                $ud = $objUserData->user_data;

                //Encrypt password using MD5 encryption alogrithm
                $ud['pwd'] = md5($ud['pwd']);

                $query = sprintf("INSERT INTO $this->m_user_table"
                        . " VALUES (null, '%s', '%s', '%s', '%s', '%s', '%s','%s', '%s', '%s')", $ud['fname'], $ud['lname'], $ud['gender'], $ud['mobile'], $ud['email'], $ud['dor'], $ud['userid'], $ud['pwd'], $ud['status']
                );

                EisLog::Record("SQL : " . $query . " | " . __FUNCTION__, __FILE__);
                return $this->ExecuteCUDQuery($query);
            }
        }

        /**
         * @function CreateAddress
         * Description: creates address of user
         * 
         * @params  array $objAddrTemp
         *
         * @return On error return null, else some postive integer 
         * 
         * @author
         */

        public function CreateAddress($objAddrTemp) {
            if (is_object($objAddrTemp)) {
                $ad = $objAddrTemp->address_data;

                $query = sprintf("INSERT INTO $this->m_address_table"
                        . " VALUES (%d, '%s', '%s', '%s', '%s', '%d')", $ad['id'], $ad['town'], $ad['city'], $ad['state'], $ad['country'], $ad['pin']
                );

                EisLog::Record("SQL : " . $query . " | " . __FUNCTION__, __FILE__);
                return $this->ExecuteCUDQuery($query);
            }
        }

        /**
         * @method DeleteUser
         * Description: Delete User using id
         * 
         * @params int $id
         * 
         *  @return 0 means updates where done else not done
         * 
         * @author
         */

        public function DeleteUser($id) {
            //$this->m_link->affected_rows = 0 ;
            $query = "DELETE FROM $this->m_user_table WHERE id=$id";
            EisLog::Record("SQL : " . $query . " | " . __FUNCTION__, __FILE__);
            $this->ExecuteCUDQuery($query);
            return $this->m_link->affected_rows;
        }

        /**
         * @method GetUserIdByName
         * Description: Get user details as per UserDataTemplate clas
         * @params var char $fname
         * 
         * @return:On error return NULL, else User data array 
         * 
         * @author
         */

        public function GetUserIdByName($fname) {
            $userid = null;
            $query = " SELECT * FROM $this->m_user_table WHERE fname LIKE '%$fname%' ";
            EisLog::Record("SQL : " . $query . " | " . __FUNCTION__, __FILE__);
            $data = $this->ExecuteSELECTQuery($query);
            if (count($data) == 1) {
                $userid = $data[0]['ID'];
            }
            return $data;
        }

        /**
         * @method GetUserIdByEmail
         * Description: Get user details as per UserDataTemplate class
         * @params var char $email
         *
         * @return:On error return NULL, else User data array 
         * 
         * @author
         */

        public function GetUserIdByEmail($email) {
            $userid = null;
            $query = "SELECT * FROM $this->m_user_table WHERE email LIKE '%$email%'";
            $data = $this->ExecuteSelectQuery($query);

            if (count($data) == 1) {
                $userid = $data[0]['ID'];
            }
            EisLog::Record("SQL:" . $query . "|" . __FUNCTION__, __FILE__);
            return $data;
        }

        /**
         * @method  GetUserById 
         * Description: Get user details as per UserDataTemplate class
         * 
         * @params int $id
         * 
         * @return: On error return NULL, else User data array 
         * 
         * @author
         */

        public function GetUserById($id) {
            $user_id = null;
            $query = "select * FROM $this->m_user_table WHERE id LIKE '%$id%'";
            $data = $this->ExecuteSelectQuery($query);
            if (sizeof($data) == 1) {
                if (empty($data[0]['userid'])) {
                    $data = null;
                }
            }

            EisLog::Record("SQL : " . $query . " | " . __FUNCTION__, __FILE__);

            return $data;
        }

        /**
         * @method SearchByFname
         * Description: Search by Fname 
         * 
         * @params: $string $fname
         * 
         * @return On error return NULL, else User List.
         * 
         * @author
         */

        public function SearchByFname($fname) {
            $user_list = array();
            $query = " SELECT * FROM $this->m_user_table WHERE fname LIKE '%$fname%' ";
            EisLog::Record("SQL : " . $query . " | " . __FUNCTION__, __FILE__);
            $user_list = $this->ExecuteSELECTQuery($query);
            return $user_list;
        }

        /**
         * @method  CreateAddressTable
         * Description:  Creates Address Table 
         * 
         * @returns runs the query
         * 
         * @author
         */

        public function CreateAddressTable() {
            $query = "CREATE TABLE IF NOT EXISTS $this->m_address_table "
                    . " ( "
                    . " ID INT PRIMARY KEY,"
                    . " FOREIGN KEY (ID) REFERENCES USERS(ID),"
                    . "  town VARCHAR(40) ,"
                    . "  city VARCHAR(40) ,"
                    . "  state VARCHAR(40) ,"
                    . "  country VARCHAR(40) ,"
                    . "  pin INT (08)"
                    . " )";


            EisLog::Record(__FUNCTION__ . " | SQL : " . $query, __FILE__);
            return $this->ExecuteCUDQuery($query);
        }

        /**
         * @method UpdateMobile
         * Description: Update user mobile details using user-id
         * 
         * @params: int $id ,int $number
         * 
         * @return 0 means updates where done else not done
         * 
         * @author
         */

        public function UpdateMobile($id, $number) {
            $query = "UPDATE $this->m_user_table SET mobile='$number' WHERE id=$id ";
            EisLog::Record("SQL : " . $query . " | " . __FUNCTION__, __FILE__);
            $this->ExecuteCUDQuery($query);
            return $this->m_link->affected_rows;
        }

        /**
         * @method UpdateAddress
         * Description: Update user address details 
         * @params: int $id, string $town,string city,string $country and int $pin
         *
         * @return 0 means updates where done else not done
         * 
         * @author
         */

        public function UpdateAddress($id, $town, $city, $country, $pin) {
            $query = "UPDATE $this->m_address_table SET town='$town',city=$city,country=$country,pin=$pin  WHERE id=$id ";
            EisLog::Record("SQL : " . $query . " | " . __FUNCTION__, __FILE__);
            $this->ExecuteCUDQuery($query);
            return $this->m_link->affected_rows;
        }

        /**
         * @method DisplayUserList
         * Description: converts indexed Array(SearchByUser) to table Data
         * 
         * @params array $userArray 
         * 
         * @returns table data 
         * 
         * @author
         */

        public function DisplayUserList($userArray) {
            $htmlTable = "<table class='my-table'>";
            if (count($userArray) == 0) {
                return null;
            }

            $row_count = count($userArray);

            for ($i = 0; $i < $row_count; $i++) {
                $htmlTable .= "<tr>";
                $htmlTable .= "<td>" . $userArray[$i]['fname'] . "</td>";
                $htmlTable .= "<td>" . $userArray[$i]['lname'] . "</td>";
                $htmlTable .= "<td>" . $userArray[$i]['mobile'] . "</td>";
                $htmlTable .= "<td>" . $userArray[$i]['email'] . "</td>";
                $htmlTable .= "<td>" . $userArray[$i]['gender'] . "</td>";
                $htmlTable .= "</tr>";
            }


            $htmlTable .= "</table>";

            return $htmlTable;
        }

        /**
         * @method  DeleteAddressTable
         * Description: Deletes Address Table 
         * 
         * @return On error return null, else some postive integer 
         * 
         * @author
         */

        public function DeleteAddressTable() {
            $query = 'DROP TABLE ' . $this->m_address_table;
            EisLog::Record("SQL : " . $query . " | " . __FUNCTION__, __FILE__);
            return $this->ExecuteCUDQuery($query);
        }

        /**
         * @method DeleteAddress
         * Description:  Deletes address of a User using given id
         * 
         * @params int id
         * 
         * @returns on success return 0 
         * 
         * @author                 
         */

        public function DeleteAddress($id) {
            $query = "DELETE FROM $this->m_address_table WHERE id=$id";
            EisLog::Record("SQL : " . $query . " | " . __FUNCTION__, __FILE__);
            $this->ExecuteCUDQuery($query);
            return $this->m_link->affected_rows;
        }

        /**
         * @method AuthenticateUser
         * Description: Authenticate User using userid and password
         * 
         * @params: mixed $userid, mixed $password
         *
         * @return 1  if user is unique
         * 
         * @author
         */

        public function AuthenticateUser($userid, $password) {
            $encPwd = md5($password);
            $query = "SELECT * FROM $this->m_user_table WHERE userid='$userid' AND pwd='$encPwd'";
            EisLog::Record("SQL : " . $query . " | " . __FUNCTION__, __FILE__);

            $dataset = $this->ExecuteSelectQuery($query);

            return count($dataset);
        }

        /**
         * @method CreateDatabase
         * Description:Creates a Database if not exists
         * 
         * @params string $dbname
         * 
         * @returns on success runs the query
         * 
         * @author
         */

        public function CreateDatabase($dbname) {

            $ret = mysqli_query($link, "CREATE DATABASE IF NOT EXISTS " . $dbname);
            return $ret;
        }

    }

}


  
