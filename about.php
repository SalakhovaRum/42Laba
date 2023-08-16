<?php
include "path.php";
include "app/controllers/topics.php";
$posts = selectAllFromPostsWithUsersOnIndex('posts', 'users');
$topTopic = selectTopTopicFromPostsOnIndex('posts');
?>

<!doctype html>
<html lang="en">
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
            <div class="main-content col-md-9 col-12">
                <h2>Наш информационный портал - это надежный и актуальный источник новостей и полезной информации. Мы предоставляем нашим пользователям самые свежие новости из мира политики, экономики, науки, культуры и спорта, а также важные события, происходящие в регионах и странах по всему миру.<br>
                    <br>

                    Мы собираем информацию только из проверенных источников и представляем ее в удобном и понятном формате. Наши статьи содержат подробную аналитику и экспертные мнения, которые помогают нашим читателям понимать суть происходящих событий.<br>
                    <br>

                    Мы также предлагаем широкий выбор тематических разделов, включая здоровье, образование, технологии, красоту и моду, которые помогают нашим пользователям быть в курсе последних тенденций и достижений в этих областях.<br>
                    <br>
                    Наша команда профессиональных журналистов и редакторов работает над тем, чтобы наш портал был полезным и интересным для всех наших читателей. Мы стремимся быть лучшим информационным порталом, который поможет нашим пользователям быть в курсе всех важных событий и сделать правильные выводы.</h2>
            </div>

            <!-- sidebar Content -->
            <div class="sidebar col-md-3 col-12">

                <div class="section search">
                    <h3>Поиск</h3>
                    <form action="search.php" method="post">
                        <input type="text" name="search-term" class="text-input" placeholder="Введите искомое слово">
                    </form>
                </div>

                <div class="section topics">
                    <h3>Категории</h3>
                    <ul>
                        <?php foreach($topics as $key => $topic): ?>
                            <li>
                                <a href="<?=BASE_URL . 'category.php?id=' . $topic['id']; ?>"><?=$topic['name']; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

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