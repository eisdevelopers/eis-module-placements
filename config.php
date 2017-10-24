<?php

  /*
* Project    : EIS Login Module
* EAO IT Services Pvt. Ltd. | www.eaoservices.com
* Copyright reserved @2017

* File Description :

* Created on : 13 Jul, 2017 | 4:42:56 PM
* Author     : Bilal Wani
* Email      : bilal.wani@eaoservices
*/

  $g_db_config = [
      'database' => 'eis_crm',
      'server' => 'localhost',
      'user' => 'root',
      'password' => ''
  ];
  
  $g_app_config = [
      'logging' => true,
      'debug_mode' => false
  ];
  
  function DebugMode(){
      global $g_app_config;
      return $g_app_config['debug_mode'];
  }
  
  
  
  //  error_reporting(0);
  define("APP_ROOT", dirname(__FILE__));
  DEFINE('BASE_URL', "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . '/');

  /*
   * Class : EisSubscribe
   * Description:
   * This class provides application configuration and database
   * credentials (if required).
   */
  if(!class_exists("EisSubscribe")){
      class EisSubscribe{
          public static $app_name = "EIS Subscribe";
       // public static $form_title = "EIS Subscribe - <small>Stay in touch with us</small>";
          // public static $form_title = "LOGIN ";
           
           
          //Database configuration
          public static $db_name = "eis_main_site";
          public static $db_user = "root";
          public static $db_pwd = "";
          public static $db_server = "localhost";
      
      }
  }
  
  


