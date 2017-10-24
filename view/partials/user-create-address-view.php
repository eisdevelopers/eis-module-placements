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

  require_once 'config.php';
  $server_url = BASE_URL . "controller/user-controller.php";
?>

<div class="container-fluid" align="center">
    <div class="eis-subscribe" id="eis-subscribe-screen">
       <h1> Create Address </h1>
        <form action="<?= $server_url ?>" class="form-horizontal" method="get" >
            <div class="eis-input-group">
                <span class="eis-add-on"><span class="glyphicon glyphicon-home"></span></span>
                <input type="text" class="form-control" name="town" placeholder="Town" required>
            </div>
            <br>
            <div class="eis-input-group">
                <span class="eis-add-on"><span class="glyphicon glyphicon-home"></span></span>
                <input type="text" class="form-control" name="city" placeholder="City " required>
            </div>
            <br>
            <div class="eis-input-group">
                <span class="eis-add-on"><span class="glyphicon glyphicon-home"></span></span>
                <input type="text" class="form-control" name="state" placeholder="State" required> 
            </div>
            <br>
            <div class="eis-input-group">
                <span class="eis-add-on"><span class="glyphicon glyphicon-flag"></span></span>
                <input type="text" class="form-control" name="country" placeholder="Country"  required> 
            </div>
            <br>
            <div class="eis-input-group">
                <span class="eis-add-on"><span class="glyphicon glyphicon-asterisk"></span></span>
                <input type="text" class="form-control" name="pin" placeholder="Pin " required> 
            </div>
            <input type="text" name="msg_id" value="<?= MSG_ID_USER_CREATE_ADDRESS?>" hidden=""> 
            <br>
            <button type="submit" class="btn btn-lg btn-info">Submit</button>
        </form>
    </div>
</div>

