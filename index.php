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
  require_once './config.php';
  include_once 'common/messages.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="./view/deps/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="./view/css/main-style.css"/> 

        <script>
            function clearform() {
                //document.getElementById("form-user-create").reset();
            }
        </script>

    </head>
    <body>
        <script src="./view/deps/jquery/jquery-3.1.1.js" type="text/javascript"></script>
        <script src="./view/deps/bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="./view/js/main-js.js" type="text/javascript"></script>
        <script src="view/js/jquery-3.2.1.min.js" type="text/javascript"></script>

        <div class="content">
            <?php
              require_once './view/partials/user-create-view.php';
              // require_once './view/partials/user-update-mobile-view.php';
              //require_once './view/partials/user-delete-view.php';
              //require_once './view/partials/user-display-view.php';
              //require_once './view/partials/user-login-view.php';
              //require_once './view/partials/user-create-address-view.php';
              //require_once './view/partials/user-search-by-id-view.php';
              //require_once './view/partials/user-del-address-view.php';
              //require_once './view/partials/user-searchuseridbyemail-view.php';
              //require_once './view/partials/user-searchuseridbyfname-view.php';
              //require_once './view/partials/user-searchuserlistbyfname-view.php';
              // require_once './view/partials/user-updateaddress-view.php';
              // require_once './view/partials/user-resume-personal.php';
//           require_once './view/partials/user-resume-education.php';
              // require_once './view/partials/user-resume-employment.php';
            ?>
        </div>

    </body>
</html>

