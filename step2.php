<?php
session_start();

$_SESSION["name"] = $_GET["name"];
$_SESSION["email"] = $_GET["email"];
?>

<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <label class="title">Assignment Submission - Details</label>
    <br>
    <label class="subtitle">Please provide your Github link and any description you want to include.</label>
    <br>
    <form action="step3.php">
        <input type="text" name="github" placeholder="Github link">
        <br>
        <textarea type="text" name="description" placeholder="description"></textarea>
        <br>
        <input type="submit">
    </form>
</body>

</html>