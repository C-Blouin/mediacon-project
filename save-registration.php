<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saving Registration</title>
    <link rel="stylesheet" href="css/app.cs">
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
    <?php
    // capture form user data from form submission
    $email = $_POST['email'];


    $ok = true;
// Add error class from css to php
    if (empty($email)) {
        echo '<p class="error">Please select an email</p>';
        $ok = false; //error happened, bad data
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo '<p class="error">Please enter a valid email format</p>';
        $ok = false; //error happened, bad data
    }


    if($ok == true){
        // connect to database
        $db = new PDO('mysql:host=172.31.22.43;dbname=Christopher200410435', 'Christopher200410435', 'xnKgLtnZ5Q');
        // set up SQL insert
        $sql = "INSERT INTO users (email) VALUES (:email)";
        $cmd = $db->prepare($sql);
        // set up and fill the parameter values for safety
        //Use bindParam if there are variables in the sql INSERT Statement.
        $cmd->bindParam(':email', $email, PDO::PARAM_STR, 100);
        //execute the sql command
        $cmd->execute();
        //disconnect
        $db = NULL;

        echo 'Your Registration was Successful.';
    }
    ?>
</body>
</html>