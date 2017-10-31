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

    <h1 style="text-align:center"> Education</h1>

    <form id="form-resume-personal" action="<?= $server_url ?>" class="form-horizontal" method="get" >  
        <div class="eis-row">
            <div class="col-md-6 ">
                <div class="col-md-4 eis-label" >
                    <label>Highest Qualification</label>
                </div>
                <div class="col-md-8">
                    <div class="eis-input-group">
                        <span class="eis-add-on"><span class="glyphicon glyphicon-education"></span></span> 
                        <select class="form-control" required>
                            <option value="" disabled selected>Select your Highest Qualification</option>
                            <option value="PHD">PHD</option>
                            <option value="MPhil">MPhil</option>
                            <option value="MCA">MCA</option>
                            <option value="MBA">MBA</option>
                            <option value="BTech">BTech</option>
                        </select>
                    </div> 
                </div>
            </div>

        </div>

        <div class="eis-row">
            <div class="col-md-6 ">
                <div class="col-md-4 eis-label" >
                    <label>University/College</label>
                </div>
                <div class="col-md-8">
                    <div class="eis-input-group">
                        <span class="eis-add-on"><span class="glyphicon glyphicon-pencil"></span></span>
                        <input type="text" class="form-control" name="uni/col" id="uni/col" placeholder="Institute Name" required>
                    </div> 
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-4 eis-label" >
                    <label>Passing Year</label>
                </div>
                <div class="col-md-8">
                    <div class="eis-input-group ">
                        <span class="eis-add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                        <select class="form-control" required>
                            <option value="" disabled selected>Select</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                        </select>
                    </div> 
                </div>
            </div>
        </div>

        <div class="eis-row">
            <div class="col-md-6 ">
                <div class="col-md-4 eis-label" >
                    <label>Course Type</label>
                </div>
                <div class="col-md-8">
                    <div class="eis-input-group">
                        <span class="eis-add-on"><span class="glyphicon glyphicon-pencil"></span></span>
                        <label class="radio-inline">
                            <input type="radio" name="coursetype" value="Regular" id="regular">Regular
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="coursetype" value="Distance" id="distance">Distance
                        </label> 
                        <label class="radio-inline">
                            <input type="radio" name="coursetype" value="Part Time" id="parttime">Part Time
                        </label> 
                    </div> 
                </div>
            </div>

        </div>

        <div class="eis-row">
            <div class="col-md-6">
                <div class="col-md-4 eis-label" >
                    <label>Key Skills</label>
                </div>
                <div class="col-md-8">
                    <div class="eis-input-group">
                        <span class="eis-add-on"><span class="glyphicon glyphicon-pencil"></span></span>
                        <input type="text" class="form-control" name="keyskills" id="keyskills" placeholder="Enter your areas of expertise/specialization" required>
                    </div> 
                </div>
            </div>

        </div>

        <div class="eis-row">
            <div class="col-md-12 ">
                <div class="col-md-9 col-xs-3" >

                </div> 
                <div class="col-md-3 col-xs-9" >
                    <button type="submit" class="btn btn-primary" id="submit" >Register Now</button>
                </div>
            </div> 
        </div> 

    </form>

</div> 



