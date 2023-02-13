<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Normalize to remove default browser styles. -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/app.css">
    <title>Post</title>
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
        <h2>Create a New Post</h2>
        <!-- Change form action -->
        <form action="save-post.php" method="post">
            <fieldset>
                <label for="body">Body</label>
                <textarea name="body" id="body" cols="30" rows="10" placeholder="Type your post here." required maxlength="4000"></textarea>
            </fieldset>
            <fieldset>
                <label for="userName">User:</label>
                <select type="text" name="userName" id="userName" placeholder="Select Saved Email">
                    <?php
                    // connect
                    $db = new PDO('mysql:host=172.31.22.43;dbname=Christopher200410435', 'Christopher200410435', 'xnKgLtnZ5Q');
                    //use select to fetch the users
                    $sql = "SELECT * FROM users";
                    // run the query
                    $cmd = $db->prepare($sql);
                    $cmd->execute();
                    $users = $cmd->fetchAll();
                    // loop through the user data to create a list item for each.
                    foreach($users as $user){
                    echo '<option>' . $user['email'] . '</option>';
                    }
                    //disconnect
                    $db = NULL;
                    ?>
                </select>
            </fieldset>
            <button type="submit" name="submit" id="submit" class="btnOffset">Post</button>
        </form>
    </main>    
</body>
</html>