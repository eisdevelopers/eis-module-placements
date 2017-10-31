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

<div class="eis-subscribe" id="eis-subscribe-screen">
    <h1> Search User Id By Email </h1>
    <form action="<?= $server_url ?>" class="form-horizontal" method="get" >
        <div class="eis-input-group">
            <span class="eis-add-on"><span class="glyphicon glyphicon-envelope"></span></span>
            <input type="email" class="form-control" name="email" placeholder="Email" required> 

            <input type="text" value="<?php echo MSG_ID_USER_SEARCHUSERIDBYEMAIL ?>" name="msg_id" hidden>
        </div>
        <br>
        <button type="submit" class="btn btn-lg btn-info">SEARCH USER ID </button>
    </form>
</div>


