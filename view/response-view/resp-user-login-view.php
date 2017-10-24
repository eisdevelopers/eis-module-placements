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


session_start();

?>
<h3>Hi <?php echo $_SESSION['user-id'] ?></h3>
<h3>You are Successfully logged In</h3>