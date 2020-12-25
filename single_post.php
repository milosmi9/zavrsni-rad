 <?php
 include('connection.php');


 $sql = "SELECT * FROM posts WHERE posts.id = {$_GET['id']}";
 $statement = $connection->prepare($sql);
 $statement->execute();
 $statement->setFetchMode(PDO::FETCH_ASSOC);
 $singlePost = $statement->fetch();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link  href="styles/styles.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    
<div class="blog-post">
        <h2 class="blog-post-title"><a href="single_post.php?post_id=<?php echo($singlePost['id']) ?>"><?php echo($singlePost['title'])?></a></h2>
        <p class="blog-post-meta"><?php echo($singlePost['created_at'])?> by <a><?php echo($singlePost['author'])?></a></p>
        <p>
        <?php echo($singlePost['body'])?>
        </p>    
       <div> <?php include ('comments.php'); ?></div>
        </div><!-- /.blog-post -->


</body>
</html>