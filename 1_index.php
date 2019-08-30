<?php
date_default_timezone_set("Asia/Kolkata");
session_start();
if(isset($_SESSION['checks'])) {
header("location:en/index.php");
}else{
?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BOOK MY STORAGE OPERATION</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>


    <![endif]-->

    <!-- Favicon and touch icons -->
    <!--<link rel="shortcut icon" href="assets/ico/favicon.png">-->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <style id="cm-font-family">

        .CodeMirror {
            font-family: Monaco, MonoSpace;
        }
    </style>

    <style id="cm-font-size">
        .CodeMirror {
            font-size: 14px;
        }
    </style>


</head>
<body>

<nav class="navbar navbar-inverse navbar-no-bg " role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">BMS</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="top-navbar-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
							<span class="li-text">
								BMS
							</span>
                    <a href="#"><strong>Bookmystorage</strong></a>
							<span class="li-text">
								Follow here Social plugins:
							</span>
							<span class="li-social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-envelope"></i></a>
								<a href="#"><i class="fa fa-skype"></i></a>
							</span>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div style="position: fixed;z-index:999;display:none;height: 100%;width: 100%;background-color: rgba(0,0,0,0.6);"
     id="myModal">
    <br><br>
    <div class="alert alert-danger center-block" style="width: 50%">
        <strong>Error!</strong> Please Enter Correct Username and Password..
    </div>
</div>
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 text">
                    <h1><strong>BMS</strong> Login Form</h1>
                    <div class="description">
                        <p>
                            This is a BMS Operation Management .
                            Powered by <a href="http://resagit.in"><strong>Resagit.in</strong></a>,
                        </p>
                    </div>
                </div>
                <div class="col-sm-5 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Sign In Now</h3>
                            <p>Fill in the form below to get instant access:</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-pencil"></i>
                        </div>
                    </div>
                    <div class="form-bottom">


                        <form role="form" class="center-block" style="">


                            <br><br>
                            <center><img src="img/icons.png" style="height: 80px" class="img-circle"></center>


                            <br>

                            <div class="form-group ">
                                <Center><input type="text" title="Enter The Username" required="" class="form-control"
                                               style="width: 90%;height: 40px" name="user_name" placeholder="User Name">
                                </Center>


                            </div>
                            <div class="form-group ">
                                <Center><input type="password" title="Enter The Password" required=""
                                               class="form-control" style="width: 90%;height: 40px" name="pass"
                                               placeholder="Password" maxlength="12"></Center>


                            </div>
                            <br>
                            <center><input type="submit" class="btn btn-default"
                                           style="background-color:#00bcff;color:#ffffff;height:50px;width: 80%"
                                           value="Login"></center>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- Javascript -->
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>

<script src="assets/js/scripts.js"></script>

<!--[if lt IE 10]>

<![endif]-->
<script type="text/javascript">
    $(function () {

        $("form").submit(function () {


            var k = $(this).serialize();
            //alert(k);
            $.post("setpref.php",k, function (oi) {

              // alert(oi);
                if ($.trim(oi) == "hi") {


                    $("#myModal").fadeIn();
                    setTimeout(function () {


                        $("#myModal").hide();


                    }, 3000);

                }
                else {


                   window.location = "en/index.php";
                }

            });
            return false;
        });

    });
</script>

</body>

</html>

<?php

}
?>

