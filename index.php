<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <label class="title">Welcome to Assignment Submission</label>
        <br>
        <label class="subtitle">To submit your assignment, please provide your name and email.</label>
        <br>
        <form action="step2.php">
            <input type="text" name="name" placeholder="name">
            <br>
            <input type="text" name="email" placeholder="email">
            <br>
            <input type="submit">
        </form>

        <label class="subtitle">Current submissions:</label>
        <table style="width: 1000px; margin-top: 50px;">
            <tr>
                <td><b>Name</b></td>
                <td><b>Email</b></td>
                <td><b>Description</b></td>
                <td><b>Github</b></td>
            </tr>    
        <?php

            try {
                error_log("Connecting to DB\n", 0);
                $dbhost = 'localhost';
                $dbname = 'id20523530_fredtest';
                $dbuser = '';
                $dbpass = '';
                $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

                $query = "SELECT name, email, description, github_link FROM assignment2";
                $stmt = $pdo->prepare($query);
                $stmt->execute();
                $stmt->bindColumn('name', $name);
                $stmt->bindColumn('email', $email);
                $stmt->bindColumn('description', $description);
                $stmt->bindColumn('github_link', $github_link);
                while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
                    echo "<tr>";
                    echo "<td>" . $name . "</td>";
                    echo "<td>" . $email . "</td>";
                    echo "<td>" . $description . "</td>";
                    echo "<td>" . $github_link . "</td>";
                    echo "</tr>";
                }

            } catch (PDOException $e) {
                echo "Error : " . $e->getMessage() . "<br/>";
                error_log("Cannot connect to DB\n", 0);
                die();
            }

        ?>
        </table>
    </body>
</html>