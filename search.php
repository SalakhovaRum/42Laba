<?php
include "path.php";
include SITE_ROOT .  "/app/databases/db.php";
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-term'])){
        $posts = searchInTittleAndContent($_POST['search-term'], 'posts', 'users');
    }
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/fa4d582593.js" crossorigin="anonymous"></script>

    <!-- Custom Styling -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <title>Information portal</title>
</head>
<body>

<?php include("app/include/header.php"); ?>


    <!-- Блок середины страницы START-->
    <div class="container">
        <div class="content row">
            <!-- Middle Content -->
            <div class="main-content col-12">
                <h2>Результаты поиска</h2>
                <?php foreach ($posts as $post): ?>
                    <div class="post row">
                        <div class="img col-12 col-md-4">
                            <img src="<?=BASE_URL . 'assets/images/posts/' . $post['img']?>" alt="<?=$post['title']?>" class="img-thumbnail">
                        </div>
                        <div class="post_text col-12 col-md-8">
                            <h3>
                                <a href="<?=BASE_URL . 'single.php?post=' .  $post['id'];?>"><?=substr($post['title'], 0, 120) . '...' ?></a>
                            </h3>
                            <i class="far fa-user"> <?=$post['username'];?></i>
                            <i class="far fa-calendar"> <?=$post['created_date'];?></i>
                            <p class="preview-text">
                                <?=mb_substr($post['content'], 0, 50, 'UTF-8') . '...' ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Блок середины страницы END -->

    <!-- footer -->
    <?php include("app/include/footer.php"); ?>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

</body>
</html>