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
$server_url = BASE_URL . 'controller/user-controller.php';
?>


    <div class="eis-subscribe" id="eis-subscribe-screen">
        <h1> Create User </h1>
        <form id="form-user-create" action="<?= $server_url ?>" class="form-horizontal" method="get" >
            <div class="eis-input-group">
                <span class="eis-add-on"><span class="glyphicon glyphicon-user"></span></span>
                <input type="text" class="form-control" name="fname" id="firstname" placeholder="First Name" required>
            </div>
            <br>
            <div class="eis-input-group">
                <span class="eis-add-on"><span class="glyphicon glyphicon-user"></span></span>
                <input type="text" class="form-control" name="lname" id="lastname" placeholder="Last Name" required>
            </div>
            <br>
            <div class="eis-input-group" style="color: lightgrey; text-align: left;">
                <span class="eis-add-on"><span class="glyphicon glyphicon-user"></span></span>

                <label class="radio-inline">
                    <input type="radio" name="gender" value="male" id="male" checked>Male
                </label>
                <label class="radio-inline">
                    <input type="radio" name="gender" value="female" id="female">Female
                </label>
            </div>
            <br>
            <div class="eis-input-group">
                <span class="eis-add-on"><span class="glyphicon glyphicon-phone-alt"></span></span>
                <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Mobile No" pattern="[0-9]{10}" title="10 digit cell no"  required> 
            </div>
            <br>
            <div class="eis-input-group">
                <span class="eis-add-on"><span class="glyphicon glyphicon-envelope"></span></span>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email"  required> 
            </div>
            <br>
            <div class="eis-input-group">
                <span class="eis-add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                <input type="date" class="form-control" name="dor" id="dor" placeholder="Date of Registration"  required> 
            </div>
            <br>
            <div class="eis-input-group">
                <span class="eis-add-on"><span class="glyphicon glyphicon-user"></span></span>
                <input type="text" class="form-control" name="user_id"  id="userid" onkeyup="nospaces(this)" placeholder="User Id"  required> 
            </div>
            <br>
            <div class="eis-input-group">
                <span class="eis-add-on"><span class="glyphicon glyphicon-pencil"></span></span>
                <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password"  required> 
            </div>
            <input type="text" value="<?= MSG_ID_USER_CREATE ?>" name="msg_id" hidden="">
            <br>
            <button type="submit" id="submit" onclick="clearform()" class="btn btn-lg btn-info">CREATE</button>
        </form>
        <div id="server-response">
            <div id="resp-msg">

            </div>
            <button id="btnclose">Close</button>
        </div>
    </div>
 
   <script>
        $(document).ready(function () {
            $("#server-response").hide();
            $("#btnclose").on("click", function () {
                $("#server-response").hide();
            });

            //  $("#resp-msg").html("Ajax error ");
            $("#submit").on('click', function (e) {
                //prevent the default sumbit form functionality
                e.preventDefault();

                //process ajax request
                $.ajax({
                    url: "<?= $server_url ?>",
                    method: "GET",
                    data: $("#form-user-create").serialize(),
                    //On success
                    success: function (respData) {
                        $("#server-response").show();
                        $("#resp-msg").html(respData);
                        $("#form-user-create")[0].reset();
                    },
                    error: function () {
                        $("#server-response").show();
                        //$("#server-response").html("Ajax error ");
                        $("#resp-msg").html("Ajax error ");
                         $("#form-user-create")[0].reset();
                    }
                    
                });
            });
        });
        
                function nospaces(t) {
                if (t.value.match(/\s/g)) {
                t.value = t.value.replace(/\s/g, '');
         }
}
    </script> 
