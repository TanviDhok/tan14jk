<?php
require 'function.php';

$php_errormsg = ''; // Initialize the error message variable

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $gender = $_POST['Gender'];
    $city = $_POST['City'];

    // Validate input (check if fields are empty)
    if (empty($name) || empty($email) || empty($gender) || empty($city)) {
        $php_errormsg = "All fields are required";
    } else {
        // Use prepared statements to avoid SQL injection
        try {
            $pdo = connecttoDb();
            $sql = "INSERT INTO user_info (name, email, gender, city) VALUES (:name, :email, :gender, :city)";
            $statement = $pdo->prepare($sql);

            // Bind parameters
            $statement->bindParam(':name', $name);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':gender', $gender);
            $statement->bindParam(':city', $city);

            // Execute the statement
            $statement->execute();
            //Connect to page contating table 
            header("Location: data.php"); 
            exit();
        } catch(PDOException $e) {
            // Handle database errors
            $php_errormsg = "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<marquee class="marq"><i>***Hiring will continue till 20Nov 2023***</i></marquee><br><br>
    <center><h1>Cupcake Royale</h1></center>

    <div class="Form">

        <form method="post">
        <h2> Register here !</h2>
        <br>

        
                <label>Name : </label>
                <input type="text" name="Name" class="form-control">
                 <label>Email : </label>
                <input type="email" name="Email" class="form-control">
                <label>Gender:
                <input type="radio" value="MALE" name="Gender" class="form1">Male
                <input type="radio" value="FEMALE" name="Gender" class="form1" >Female 
                <input type="radio" value="OTHERS" name="Gender" class="form1">Others 
                </label>
                <br></br>
                <label>City : </label>
                <select name="City" class="form-control">
                    <option value="New York">New York</option>
                    <option value="Las Vegas">Las Vegas</option>
                    <option value="San Francisco">San Francisco</option>
                    <option value="Seattle">Seattle</option>
                    <option value="Seoul">Seoul</option>
                    <option value="Washington DC">Washington DC</option>
                </select>
            
            
                <input type="submit" value="Submit" id="button">
</div>
        </form>

    

    <?php
    // Display error message if any
    if (!empty($php_errormsg)) {
        echo "<p>Error: $php_errormsg</p>";
    }
    ?>
</body>
</html>
