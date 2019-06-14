<?php

require 'database.php'; // Connexion à la bdd
$request = 'SELECT  posts.id as postId,
                    authors.id as authorId,
                    title,
                    content,
                    short_content,
                    image,
                    posts.created_at, 
                    posts.updated_at,
                    email,
                    firstname,
                    lastname
            FROM posts
            LEFT JOIN authors
                ON authors.id = posts.author_id';
$response = $bdd->query($request);
$posts = $response->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">

<head>
    <title>Project: Blog</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/blog.css">
</head>

<body>

    <div class="container">
        <?php include('partials/_navbar.php'); ?>

        <main role="main" class="container">
            <div class="row">
                <div class="col-md-8 blog-main">
                    <h3 class="pb-3 mb-4 font-italic border-bottom">
                        Les dernières actualités
                    </h3>

                    <?php foreach ($posts as $post) : ?>
                        <div class="blog-post mb-3 border-bottom">
                            <h2 class="blog-post-title"><?= $post['title'] ?></h2>
                            <p class="blog-post-meta"><?= $post['created_at'] ?> par <a href="#"><?= $post['firstname'] ?> <?= $post['lastname'] ?></a></p>

                            <p class="lead">

                                <?= $post['short_content'] ?>
                                <br>

                                <p class="text-right">
                                    <a class="btn btn-sm btn-outline-secondary text-right" href="article.php?id=<?= $post['postId'] ?>">Lire plus <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                </p>
                            </p>
                        </div><!-- /.blog-post -->
                    <?php endforeach; ?>

                    <nav class="blog-pagination">
                        <a class="btn btn-outline-primary" href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        <a class="float-right btn btn-outline-secondary disabled" href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    </nav>

                </div><!-- /.blog-main -->

                <?php include('partials/_sidebar.php'); ?>

            </div><!-- /.row -->
        </main><!-- /.container -->

        <?php include('partials/_footer.php'); ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>