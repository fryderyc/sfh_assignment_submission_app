<?php
session_start();
$name = $_SESSION["name"];
$email = $_SESSION["email"];
$github = $_GET["github"];
$description = $_GET["description"];

$_SESSION["github"] = $github;
$_SESSION["description"] = $description;
?>

<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <label class="title">Assignment Submission - Confirm</label>
        <br>
        <label class="subtitle">Please confirm the following details, and click "Send" once all information is confirmed to be correct.</label>
        <br>
        <div class="confirmDetail">
            <label class="detailHeader">Name</label>
            <label class="detailBody"><?=$name?></label>
            <label class="detailHeader">Email</label>
            <label class="detailBody"><?=$email?></label>
            <label class="detailHeader">Github Link</label>
            <label class="detailBody"><?=$github?></label>
            <label class="detailHeader">Description</label>
            <label class="detailBody"><?=$description?></label>
        </div>
        <br/>
        <form action="dbsave.php">
            <input type="submit">
            <input type="button" value="Back" onclick="history.back()">
        </form>
    </body>
</html>