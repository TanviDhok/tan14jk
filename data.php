<?php
require 'function.php';
$pdo=connecttoDb();
$statement=$pdo->prepare('SELECT * FROM user_info');
$statement->execute();
$users=$statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel= "stylesheet" href="style2.css">
    <title>List of Registered People </title>
</head>
<body>
    <div class="container" >
    <h2>Registered Employees</h2><center>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>City</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($users as $user) {
                    echo "<tr>";
                    echo "<td>" . $user['name'] . "</td>";
                    echo "<td>" . $user['email'] . "</td>";
                    echo "<td>" . $user['gender'] . "</td>";
                    echo "<td>" . $user['city'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        </center>
    </div>
    
</body>

</html>