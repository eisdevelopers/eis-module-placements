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
    <div id="main"> 
        <div id="close" class="btn btn-lg">Close</div>

    </div>
    <h1> Login </h1>
    <form action="<?= $server_url ?>" class="form-horizontal" method="get" >

        <br>
        <div class="eis-input-group">
            <span class="eis-add-on"><span class="glyphicon glyphicon-user"></span></span>

            <input type="userid" class="form-control" id="userid" placeholder="Enter UserId" name="userid" autofocus required>
        </div>
        <br>
        <div class="eis-input-group">
            <span class="eis-add-on"><span class="glyphicon glyphicon-lock"></span></span>

            <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
        </div>
        <br>
        <input type="text" name="msg_id" value="<?= MSG_ID_USER_AUTHENTICATION ?>" hidden=""> 
        <button type="submit" class="btn btn-lg btn-info">Login</button> 
        <a href="#"> Forget password?</a>            


        <script>
            function hideMe() {
                $("#eis-subscribe-screen").hide();
            }
            $("#close").on("click", hideMe);
            document.getElementById("btnSubmit").addEventListener("click", function (event) {
                event.preventDefault();
                SendAjaxReq();
            });

            function SendAjaxReq() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("output").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "<?= $server_url ?>", true);
                xhttp.send();
            }
        </script>

    </form>
</div>