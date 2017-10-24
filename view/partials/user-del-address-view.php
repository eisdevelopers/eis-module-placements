<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'config.php';

$server_url = BASE_URL . "controller/user-controller.php";
?>
<div class="container-fluid" align="center">
    <div class="eis-subscribe" id="eis-subscribe-screen">
        <h1> Delete User Address </h1>
        <form action="<?= $server_url ?>" class="form-horizontal" method="get" >
            <div class="eis-input-group">
                <span class="eis-add-on"><span class="glyphicon glyphicon-user"></span></span>
                <input type="text" class="form-control" name="id" placeholder="ID" required>
                <input type="text" value="<?php echo MSG_ID_USER_DELETEADDRESS ?>" name="msg_id" hidden>
            </div>
            <br>
          <button type="submit" class="btn btn-lg btn-info">DELETE USER ADDRESS</button>
        </form>

            

            
