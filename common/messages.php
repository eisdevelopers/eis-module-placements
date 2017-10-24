<?php

  /*
* Project    : EIS Login Module
* EAO IT Services Pvt. Ltd. | www.eaoservices.com
* Copyright reserved @2017

* File Description :

* Created on : 13 Jul, 2017 | 5:05:05 PM
* Author     : Bilal Wani
* Email      : bilal.wani@eaoservices

*/
if ( !class_exists("EisErrorMessage") ) {
   class EisErrorMessage{
       public static $NO_ERROR = "No error. All OK";
       public static $DB_NOT_CONNECTED = 'No database connected';
   }
   
   class EisUserMessage{
       public static $USER_CREATED = "User CREATED successfully";
       public static $USER_CREATE_ERROR = "User not added. Please check for errors";
       public static $USER_DELETED = "User DELETED successfully";
       public static $USER_DELETE_ERROR = "Unable to delete. Please try again";
       public static $USER_ID_INVALID = "Invalid user id";
       public static $USER_TABLE_CREATED = "User Table Created";
       public static $USER_TABLE_DELETED = "User Table Deleted";
       public static $USER_TABLE_DELETE_ERROR = "Unable to DELTE user table. Try again";
       public static $ADDRESS_TABLE_CREATED = "Address Table Created";
       public static $ADDRESS_DELETED = "Address DELETED successfully";
       public static $ADDRESS_DELETE_ERROR = "Unable to delete. Please try again";
       public static $ADDRESS_ID_INVALID = "Invalid address id";
       public static $ADDRESS_TABLE_DELETED = "Address Table Deleted";
       public static $ADDRESS_TABLE_DELETE_ERROR = "Unable to DELETE address table. Try again";
   }
}


define("MSG_ID_USER_CREATE", 1);
define("MSG_ID_USER_UPDATE", 2);
define("MSG_ID_USER_SEARCH", 3);
define("MSG_ID_USER_DELETE", 4);
define("MSG_ID_USER_DISPLAY", 5);
define("MSG_ID_USER_AUTHENTICATION", 6);
define("MSG_ID_USER_CREATE_ADDRESS", 7);
define("MSG_ID_USER_SEARCHBYID", 8);
define("MSG_ID_USER_DELETEADDRESS",9);
define("MSG_ID_USER_SEARCHUSERIDBYEMAIL",10);
define("MSG_ID_USER_SEARCHUSERIDBYFNAME",11);
define("MSG_ID_USER_SEARCHUSERLISTBYFNAME",12);
define("MSG_ID_USER_UPDATEADDRESS",13);