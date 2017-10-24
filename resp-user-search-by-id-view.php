<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="./view/deps/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="./view/css/main-style.css"/>       

    </head>
    <body>
        <div class="content">
            <div class="container-fluid" align="center">
                <div class="eis-subscribe" id="eis-subscribe-screen">
                    <h1> Display User </h1>

                    <div class="eis-input-group">
                        <span class="eis-add-on"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" class="form-control" name="fname" placeholder="First Name" required>
                    </div>
                    <br>
                    <div class="eis-input-group">
                        <span class="eis-add-on"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" class="form-control" name="lname" placeholder="Last Name" required>
                    </div>
                    <br>
                    <div class="eis-input-group" style="color: lightgrey; text-align: left;">
                        <span class="eis-add-on"><span class="glyphicon glyphicon-user"></span></span>

                        <label class="radio-inline">
                            <input type="radio" name="gender" value="male">Male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="female">Female
                        </label>
                    </div>
                    <br>
                    <div class="eis-input-group">
                        <span class="eis-add-on"><span class="glyphicon glyphicon-phone-alt"></span></span>
                        <input type="tel" class="form-control" name="mobile" placeholder="Mobile No" pattern="[0-9]{10}" title="10 digit cell no" required> 
                    </div>
                    <br>
                    <div class="eis-input-group">
                        <span class="eis-add-on"><span class="glyphicon glyphicon-envelope"></span></span>
                        <input type="email" class="form-control" name="email" placeholder="Email" required> 
                    </div>
                    <br>
                    <div class="eis-input-group">
                        <span class="eis-add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                        <input type="date" class="form-control" name="dor" placeholder="Date of Registration" required> 
                    </div>
                    <br>
                    <div class="eis-input-group">
                        <span class="eis-add-on"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" class="form-control" name="user_id" placeholder="User Id" required> 
                    </div>
                    
                </div>
            </div>
        </div>
        <script src="./view/deps/jquery/jquery-3.1.1.js" type="text/javascript"></script>
        <script src="./view/deps/bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="./view/js/main-js.js" type="text/javascript"></script>
    </body>
</html>

