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

<div class="container-fluid" >
    <div class="eis-form-general eis-resume-personal" id="eis-subscribe-screen">

        <h1 style="text-align:center">Employment </h1>

        <form id="form-resume-personal" action="<?= $server_url ?>" class="form-horizontal" method="get" >  
            <div class="eis-row">
                <div class="col-md-6 ">
                    <div class="col-md-4 eis-label" >
                        <label>Are you</label>
                    </div>
                    <div class="col-md-8">
                        <div class="eis-input-group">
                             <span class="eis-add-on"><span class="glyphicon glyphicon-briefcase"></span></span>
                            <label class="radio-inline">
                                <input type="radio" name="fresher" value="Fresher" id="fresher">Fresher
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="experienced" value="Experienced" id="experienced">Experienced
                            </label> 
                        </div> 
                    </div>
                </div>

            </div>

            <div class="eis-row">
                <div class="col-md-6 ">
                    <div class="col-md-4 eis-label" >
                        <label>Total Experience</label>
                    </div>
                    <div class="col-md-8">
                        <div class="eis-input-group">
                            <span class="eis-add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                              <select class="form-control" required>
                                    <option value="" disabled selected>Years</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                        </div> 
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-8">
                        <div class="eis-input-group">
                            <span class="eis-add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                              <select class="form-control" required>
                                    <option value="" disabled selected>Months</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                        </div> 
                    </div>
                </div>
            </div>

            
            <div class="eis-row">
                <div class="col-md-6 ">
                    <div class="col-md-4 eis-label" >
                        <label>Current Salary</label>
                    </div>
                    <div class="col-md-8">
                        <div class="eis-input-group">
                            <span class="eis-add-on"><span class="glyphicon glyphicon-pencil"></span></span> 
                            <input type="text" class="form-control" name="currentsalary" id="currentsal" placeholder="Enter your Current Salary" required>
                        </div>
                    </div>
                </div>  
                <div class="col-md-6">
                    <div class="col-md-4 eis-label" >
                        <label>Expected Salary </label>
                    </div>
                    <div class="col-md-8">
                        <div class="eis-input-group ">
                         <span class="eis-add-on"><span class="glyphicon glyphicon-pencil"></span></span>
                        <input type="text" class="form-control" name="expectedsalary" id="expectedsal" placeholder="Enter your Expected Salary" required>
                      </div>
                    </div>
                </div>
            </div>
            <div class="eis-row">
                <div class="col-md-6">
                    <div class="col-md-4 eis-label" >
                        <label>Current Job Details</label>
                    </div>
                </div>
            </div>

            <div class="eis-row">
                <div class="col-md-6 ">
                    <div class="col-md-4 eis-label" >
                        <label>Designation</label>
                    </div>
                    <div class="col-md-8">
                        <div class="eis-input-group">
                            <span class="eis-add-on"><span class="glyphicon glyphicon-pencil"></span></span> 
                            <input type="text" class="form-control" name="designation" placeholder="Enter your Designation"  required> 
                        </div>
                    </div>
                </div>  
              
                <div class="col-md-6">
                    <div class="col-md-4 eis-label" >
                        <label>Company Name</label>
                    </div>
                    <div class="col-md-8">
                        <div class="eis-input-group ">
                            <span class="eis-add-on"><span class="glyphicon glyphicon-pencil"></span></span> 
                            <input type="text" class="form-control" name="companyname" placeholder="Enter your Company Name"  required>  

                        </div>
                    </div>
                </div>
            </div>
                <div class="eis-row">
                    <div class="col-md-6 ">
                        <div class="col-md-4 eis-label" >
                            <label>Date of Joining</label>
                        </div>
                        <div class="col-md-8">
                            <div class="eis-input-group">
                                <span class="eis-add-on"><span class="glyphicon glyphicon-calendar"></span></span> 
                            <input type="text" class="form-control" name="doj"  placeholder="Enter Date of Joining"  required>  
                            </div>
                        </div>
                    </div>  

                    <div class="col-md-6">
                        <div class="col-md-4 eis-label" >
                            <label>Date of Relieving</label>
                        </div>
                        <div class="col-md-8">
                            <div class="eis-input-group ">
                                  <span class="eis-add-on"><span class="glyphicon glyphicon-calendar"></span></span> 
                            <input type="text" class="form-control" name="dol" placeholder="Enter Date of Relieving"  required>  
                            </div>
                        </div>
                    </div>
                      </div>
                    <div class="eis-row">
                        <div class="col-md-6 ">
                            <div class="col-md-5 eis-label" >
                                <label>Take Two Personal References</label>
                            </div>
                            
                        </div>
                    </div>
            

                    <div class="eis-row">
                        <div class="col-md-6 ">
                            <div class="col-md-4 eis-label" >
                                <label>Name</label>
                            </div>
                            <div class="col-md-8">
                                <div class="eis-input-group">
                                    <span class="eis-add-on"><span class="glyphicon glyphicon-user"></span></span> 
                                    <input type="text" class="form-control" name="name" placeholder="Enter Name"  required> 
                                </div>
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="col-md-4 eis-label" >
                                <label>Mobile</label>
                            </div>
                            <div class="col-md-8">
                                <div class="eis-input-group ">
                                    <span class="eis-add-on"><span class="glyphicon glyphicon-phone"></span></span> 
                                    <input type= "text"  class="form-control" name="mobile" placeholder="Enter Mobile"  required>  
                                </div>
                            </div>
                        </div>
                    </div>
                         <div class="eis-row">
                        <div class="col-md-6 ">
                            <div class="col-md-4 eis-label" >
                                <label>Relationship with Candidate</label>
                            </div>
                            <div class="col-md-8">
                                <div class="eis-input-group">
                                    <span class="eis-add-on"><span class="glyphicon glyphicon-pencil"></span></span> 
                                    <input type="text" class="form-control" name="relation" placeholder="Enter Relationship"  required> 
                                </div>
                            </div>
                        </div>  
                         </div>
                 
                    <div class="eis-row">
                        <div class="col-md-6 ">
                            <div class="col-md-4 eis-label" >
                                <label>Name</label>
                            </div>
                            <div class="col-md-8">
                                <div class="eis-input-group">
                                    <span class="eis-add-on"><span class="glyphicon glyphicon-user"></span></span> 
                                    <input type="text" class="form-control" name="name" placeholder="Enter Name"  required> 
                                </div>
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="col-md-4 eis-label" >
                                <label>Mobile</label>
                            </div>
                            <div class="col-md-8">
                                <div class="eis-input-group ">
                                    <span class="eis-add-on"><span class="glyphicon glyphicon-phone"></span></span> 
                                    <input type= "text"  class="form-control" name="mobile" placeholder="Enter Mobile"  required>  
                                </div>
                            </div>
                        </div>
                    </div>
                         <div class="eis-row">
                        <div class="col-md-6 ">
                            <div class="col-md-4 eis-label" >
                                <label>Relationship with Candidate</label>
                            </div>
                            <div class="col-md-8">
                                <div class="eis-input-group">
                                    <span class="eis-add-on"><span class="glyphicon glyphicon-pencil"></span></span> 
                                    <input type="text" class="form-control" name="relation" placeholder="Enter Relationship"  required> 
                                </div>
                            </div>
                        </div>  
                         </div>
            
                    <div class="eis-row">
                        <div class="col-md-12 ">
                            <div class="col-md-9 col-xs-3" >

                            </div> 
                            <div class="col-md-3 col-xs-9" >
                                <button type="submit" class="btn btn-primary" id="submit" >Submit</button>
                            </div>
                        </div> 
                    </div> 

                    </form>

                      </div> 
                    </div> 
            

