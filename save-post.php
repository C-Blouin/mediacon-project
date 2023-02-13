<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save Post</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<header>
        <h1><a href="#">MediaCon</a></h1>
        <nav>
            <ul>
                <li><a href="posts.php">Posts</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>                
            </ul>
        </nav>
    </header>
    <main>
        <?php
        //Capture users name input and post the information.
        // $firstName = $_POST['firstName'];
        //Capture the form body input using the $_POST array & store in a var.
        $body = $_POST['body'];
        $userName = $_POST['userName'];
        // echo $body;
        //Calculate the date and time with php. month,day,year, hours, minutes.
        date_default_timezone_set("America/Toronto");
        $dateCreated = date("y-m-d h:i");
        // echo $dateCreated;
        //Lesson 4 Validation
        //Starts with no validation errors
        $ok = true;
        
        // Add error class from css to php
        if (empty($body)) {
            echo '<p class="error">To make a post, please type some information.</p>';
            $ok = false; //error happened, bad data
        }
        if (empty($userName)) {
            echo "<p>Please select a user to make a post.</p>";
            $ok = false;
        }
        if($ok == true){
        //Only save to db if $ok has never been changed to false
        //connect to the database using PDO library. Type of database, host (where is the server), dbname, username and database password.
        $db = new PDO('mysql:host=172.31.22.43;dbname=Christopher200410435', 'Christopher200410435', 'xnKgLtnZ5Q');
        //IF we can connect, echo connectedm ELSE, Connection Failed.
        // if ($db){
        //     echo 'Connected';
        // }
        // //Will error if not connected to student VPN
        // else {
        //     echo 'Connection Failed';
        // }
        //set up an SQL insert    //Value placeholders
        $sql = "INSERT INTO posts (body, userName, dateCreated) VALUES (:body, :userName, :dateCreated)";
        //Map each inout to the corresponding database column
        $cmd = $db->prepare($sql);
        //Check if the user entered a string with correct values
        $cmd->bindParam(':body', $body, PDO::PARAM_STR, 4000);
        $cmd->bindParam(':userName', $userName, PDO::PARAM_STR, 100);
        $cmd->bindParam(':dateCreated', $dateCreated, PDO::PARAM_STR);
        //Execute insert
        $cmd->execute();
        //Disconnect
        $db = null;
        //Show the user a message.
        echo 
        '<h1>Post Saved</h1>
        <p><a href="posts.php">See the updated feed</a></p>';
        }
        
        ?>
    </main>
</body>
</html>