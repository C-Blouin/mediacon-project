<!-- No html, only php validation, it is an invisible page that redirects to the updated post page. -->

<?php 

// Indentify which post to remove, reference posts php loop
$postId = $_GET['postId'];
// Connect to database
$db = new PDO('mysql:host=172.31.22.43;dbname=Christopher200410435', 'Christopher200410435', 'xnKgLtnZ5Q');
// Create SQL statement
$sql = "DELETE FROM posts WHERE postId = :postId";
// populate the SQL delete with selected postId
$cmd = $db->prepare($sql);
$cmd->bindParam(':postId', $postId, PDO::PARAM_INT);
// execute delete in database
$cmd->execute();
// disconnect
$db = NULL;
// redirect to posts
// Redirection, this page wont display, add the redirect add the end, after debugging.
header('location:posts.php');
?>