<!DOCTYPE html>
<!-- release v4.3.1, copyright 2014 - 2015 Kartik Visweswaran -->
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Krajee JQuery Plugins - &copy; Kartik</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../js/fileinput.js" type="text/javascript"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
<div class="container kv-main">
    <div class="page-header">


        <form enctype="multipart/form-data">
<?php

session_start();
$_SESSION['challan']=$_GET['challan'];
$_SESSION['order_id']=$_GET['order_id'];


?>

            <label>Change POD Image</label>
            <input id="file-en" name="file-en" type="file" multiple>
            <div id="kv-success-2"  style="margin-top:10px;"></div>

        </form>
        <hr>
        <br>
    </div></div>
</body>
<script>

    $('#file-en').fileinput({

        uploadUrl: 'index2.php',
        allowedFileExtensions : ['jpg', 'png','gif'],
        elErrorContainer: '#kv-error-2'

    }).on('filebatchuploadsuccess', function(event, data) {



        alert('');
        }).on('filebatchuploadcomplete', function(event, data) {


$("#kv-success-2").html("<div class='alert alert-success'><strong>Success!</strong> File Uploaded </div>");
        $("button .hidden-xs").click();
    });








    $("#file-0").fileinput({
        'allowedFileExtensions' : ['jpg', 'png','gif']
    });

    /*
     $(".file").on('fileselect', function(event, n, l) {
     alert('File Selected. Name: ' + l + ', Num: ' + n);
     });
     */

    $(".btn-warning").on('click', function() {
        if ($('#file-4').attr('disabled')) {
            $('#file-4').fileinput('enable');
        } else {
            $('#file-4').fileinput('disable');
        }
    });
    $(".btn-info").on('click', function() {
        $('#file-4').fileinput('refresh', {previewClass:'bg-info'});
    });
    /*
     $('#file-4').on('fileselectnone', function() {
     alert('Huh! You selected no files.');
     });
     $('#file-4').on('filebrowse', function() {
     alert('File browse clicked for #file-4');
     });
     */
    $(document).ready(function() {

        /*
         $("#test-upload").on('fileloaded', function(event, file, previewId, index) {
         alert('i = ' + index + ', id = ' + previewId + ', file = ' + file.name);
         });
         */


    });
</script>
</html>