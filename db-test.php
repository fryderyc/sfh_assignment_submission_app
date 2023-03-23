<?php

try {
    error_log("Connecting to DB\n", 0);
    $dbhost = 'localhost';
    $dbname = 'skillsforhire';
    $dbuser = 'root';
    $dbpass = '';
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

} catch (PDOException $e) {
    echo "Error : " . $e->getMessage() . "<br/>";
    error_log("Cannot connect to DB\n", 0);
    die();
}

$query = "SELECT email FROM assignment WHERE email = :email";
$stmt = $conn->prepare($query);
$stmt->execute(["email" => "test"]);
$stmt->bindColumn('email', $email);
while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
    echo "$email" . "<br>";
}
?>