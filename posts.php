<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
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
        <h1>Posts</h1>
        <a href="post-details.php">Add a New Post</a>
        <?php
        // connect to database
        $db = new PDO('mysql:host=172.31.22.43;dbname=Christopher200410435', 'Christopher200410435', 'xnKgLtnZ5Q');
        // set up an SQL select command
        // Order by descending order.
        $sql = "SELECT * FROM posts ORDER BY postId DESC";
        // execute the select query
        $cmd = $db->prepare($sql);
        $cmd->execute();
        // store all query results in an array.
        // fetchAll for all records, just use fetch for a single column of data.
        $posts =$cmd->fetchAll();
        //open table
        // echo '<table>
        // <thead><th>Body</th><th>User</th><th>Date</th></thead>';
        
        // display the post data in a loop. $posts = all data, $post = current item in the loop.
        foreach($posts as $post){
            echo '<article>
            <h2>' .  $post['userName'] . '</h2>
            <p>' . $post['dateCreated'] . '</p>
            <p>' . $post['body'] . '</p>
            <a href="delete-post.php">Delete</a>
            </article>';
            // Could wrap all the code in one echo statement.
            // echo '<tr>';
            // echo '<td>' . $post['body'] . '</td>';
            // echo '<td>' . $post['userName'] . '</td>';
            // echo '<td>' . $post['dateCreated'] . '</td>';
            // echo '</tr>';
        }
        //close table
        // echo '</table>';
        // disconnect from database
        $db = null;
        ?>
    </main>
</body>
</html>