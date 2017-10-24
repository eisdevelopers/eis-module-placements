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


<div class="eis-form-general eis-resume-personal" id="eis-subscribe-screen">

    <h1 style="text-align:center"> Personal </h1>

    <form id="form-resume-personal" action="<?= $server_url ?>" class="form-horizontal" method="get" >  
        <div class="eis-row">
            <div class="col-md-6 ">
                <div class="col-md-4 eis-label" >
                    <label>DOR</label>
                </div>
                <div class="col-md-8">
                    <div class="eis-input-group">
                        <span class="eis-add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                        <input type="date" class="form-control" name="dor"  required>
                    </div> 
                </div>
            </div>

        </div>

        <div class="eis-row">
            <div class="col-md-6 ">
                <div class="col-md-4 eis-label" >
                    <label>First Name</label>
                </div>
                <div class="col-md-8">
                    <div class="eis-input-group">
                        <span class="eis-add-on"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" class="form-control" name="fname" id="firstname" placeholder="Enter your First Name" required>
                    </div> 
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-4 eis-label" >
                    <label>Last Name</label>
                </div>
                <div class="col-md-8">
                    <div class="eis-input-group ">
                        <span class="eis-add-on"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" class="form-control" name="lname" id="lastname" placeholder="Enter your Last Name" required>
                    </div> 
                </div>
            </div>
        </div>

        <div class="eis-row">
            <div class="col-md-6 ">
                <div class="col-md-4 eis-label" >
                    <label>Gender</label>
                </div>
                <div class="col-md-8">
                    <div class="eis-input-group">
                        <span class="eis-add-on"><span class="glyphicon glyphicon-user"></span></span>
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="male" id="male">Male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="female" id="female">Female
                        </label> 
                    </div> 
                </div>
            </div>

        </div>

        <div class="eis-row">
            <div class="col-md-6 ">
                <div class="col-md-4 eis-label" >
                    <label>Mobile Number</label>
                </div>
                <div class="col-md-8">
                    <div class="eis-input-group">
                        <span class="eis-add-on"><span class="glyphicon glyphicon-phone-alt"></span></span> 
                        <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Enter your Mobile No" pattern="[0-9]{10}" title="10 digit cell no"  required> 
                    </div>
                </div>
            </div>  
            <div class="col-md-6">
                <div class="col-md-4 eis-label" >
                    <label>Email</label>
                </div>
                <div class="col-md-8">
                    <div class="eis-input-group ">
                        <span class="eis-add-on"><span class="glyphicon glyphicon-envelope"></span></span>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your Email" required>

                    </div>
                </div>
            </div>
        </div>
        <div class="eis-row">
            <div class="col-md-6">
                <div class="col-md-4 eis-label" >
                    <label>Address</label>
                </div>
            </div>
        </div>

        <div class="eis-row">
            <div class="col-md-6 ">
                <div class="col-md-4 eis-label" >
                    <label>Town</label>
                </div>
                <div class="col-md-8">
                    <div class="eis-input-group">
                        <span class="eis-add-on"><span class="glyphicon glyphicon-home"></span></span> 
                        <input type="text" class="form-control" name="town" placeholder="Enter your Town"  required> 
                    </div>
                </div>
            </div>  

            <div class="col-md-6">
                <div class="col-md-4 eis-label" >
                    <label>City</label>
                </div>
                <div class="col-md-8">
                    <div class="eis-input-group ">
                        <span class="eis-add-on"><span class="glyphicon glyphicon-home"></span></span> 
                        <input type="text" class="form-control" name="city" placeholder="Enter your City"  required>  

                    </div>
                </div>
            </div>
        </div>
        <div class="eis-row">
            <div class="col-md-6 ">
                <div class="col-md-4 eis-label" >
                    <label>State</label>
                </div>
                <div class="col-md-8">
                    <div class="eis-input-group">
                        <span class="eis-add-on"><span class="glyphicon glyphicon-flag"></span></span> 
                        <select class="form-control" required>
                            <option value="" disabled selected>Select your State</option>
                            <option value="JK">JK</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="UP">UP</option>
                        </select>
                    </div>
                </div>
            </div>  

            <div class="col-md-6">
                <div class="col-md-4 eis-label" >
                    <label>Country</label>
                </div>
                <div class="col-md-8">
                    <div class="eis-input-group ">
                        <span class="eis-add-on"><span class="glyphicon glyphicon-flag"></span></span> 
                        <select class="form-control" required>
                            <option value="" disabled selected>Select your Country</option>
                            <option value="Nepal">Nepal</option>
                            <option value="USA">USA</option>
                            <option value="Kenya">Kenya</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="eis-row">
            <div class="col-md-6 ">
                <div class="col-md-4 eis-label" >
                    <label>Pincode</label>
                </div>
                <div class="col-md-8">
                    <div class="eis-input-group">
                        <span class="eis-add-on"><span class="glyphicon glyphicon-asterisk"></span></span> 
                        <input type="text" class="form-control" name="Pincode" placeholder="Enter your  Pincode"   >
                    </div> 
                </div>
            </div>
        </div>

        <div class="eis-row">
            <div class="col-md-6 ">
                <div class="col-md-4 eis-label" >
                    <label>Username</label>
                </div>
                <div class="col-md-8">
                    <div class="eis-input-group">
                        <span class="eis-add-on"><span class="glyphicon glyphicon-user"></span></span> 
                        <input type="text" class="form-control" name="username" placeholder="Username"  required> 
                    </div>
                </div>
            </div>  
            <div class="col-md-6">
                <div class="col-md-4 eis-label" >
                    <label>Create Password</label>
                </div>
                <div class="col-md-8">
                    <div class="eis-input-group ">
                        <span class="eis-add-on"><span class="glyphicon glyphicon-pencil"></span></span> 
                        <input type= "password"  class="form-control" name="pwd" placeholder="minimum 8 character"  required>  
                    </div>
                </div>
            </div>
        </div>

        <div class="eis-row">
            <div class="col-md-12 ">
                <div class="col-md-9 col-xs-3" >

                </div> 
                <div class="col-md-3 col-xs-9" >
                    <button type="submit" class="btn btn-primary" id="submit" >Next</button>
                </div>
            </div> 
        </div> 

    </form>

</div> 



