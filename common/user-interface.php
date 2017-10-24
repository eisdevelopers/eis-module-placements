<?php

  /*
   * Project    : EIS Login Module
   * EAO IT Services Pvt. Ltd. | www.eaoservices.com
   * Copyright reserved @2017

   * File Description :

   * Created on : 13 Jul, 2017 | 7:19:50 PM
   * Author     : Bilal Wani
   * Email      : bilal.wani@eaoservices

   */
  
  class UserDataTemplate {

      public $user_data = [
          'id' => null,
          'fname' => '',
          'lname' => '',
          'gender' => '',
          'mobile' => '',
          'email' => '',
          'dor' => '',
          'userid' => '',
          'pwd' => '',
          'status' => ''
      ];

  }
  class AddressDataTemplate {

      public $address_data = [
          'id' => 0,
          'town' => '',
          'city' => '',
          'state' => '',
          'country' => '',
          'pin' => '',
         
      ];

  }
   