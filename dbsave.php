<?php

session_start();
$name = $_SESSION["name"];
$email = $_SESSION["email"];
$github = $_SESSION["github"];
$description = $_SESSION["description"];

?>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    try {
        error_log("Connecting to DB\n", 0);
        $dbhost = 'localhost';
        $dbname = 'id20523530_fredtest';
        $dbuser = 'root';
        $dbpass = '';
        $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);


        $sql = "INSERT INTO `assignment2` (`name`, `email`, `description`, `github_link`) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);

        $pdo->beginTransaction();
        $stmt->execute([$name, $email, $description, $github]);
        $pdo->commit();

        ?>
        <label class="title">Assignment Submission - Submitted</label>
        <br>
        <label class="subtitle">Your assignment is successfully submitted.</label>
        <br>
        <?php

    } catch (Exception $e) {
        echo "Error : " . $e->getMessage() . "<br/>";
        error_log("Cannot connect to DB\n", 0);

        ?>
        <label class="title">Assignment Submission - Failed</label>
        <br>
        <label class="subtitle">Encountered technical errors. Please contact system administrator.</label>
        <br>
        <?php
    }
    ?>


</body>

</html>