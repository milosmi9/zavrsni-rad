<?php
include('connection.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php include('header.php');?>

    <?php 




                    $sql = "SELECT * FROM posts ORDER BY created_at DESC";
                    $statement = $connection->prepare($sql);
                    $statement->execute();
                    $statement->setFetchMode(PDO::FETCH_ASSOC);
                    $posts = $statement->fetchAll();
                    ?>
                   

               
    
   <?php foreach ($posts as $post ) {?> 
        <div class="blog-post">
                <h2 class="blog-post-title"><a href="single_post.php"><?php echo $post['title']; ?></a></h2>
                <p class="blog-post-meta"><?php echo $post['created_at']; ?> by <a href="#"><?php echo $post['author']; ?></a></p>
                <p><?php echo $post['body'] ?></p>
            </div><!-- /.blog-post -->
    <?php } ?>

            



    <?php
    include('footer.php');
    ?>
</body>
</html>