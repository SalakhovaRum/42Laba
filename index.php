<?php include 'path.php';
    include 'app/databases/db.php';
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

<!-- Блок карусели START -->
<div class="container">
    <div class="row">
        <h2 class="slider-title">Топ публикации</h2>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/images/image_2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5><a href="">First slide label</a> </h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/image_1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5><a href="">First slide label</a> </h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/image_3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5><a href="">First slide label</a> </h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Блок карусели END -->

<!-- Блок середины страницы START-->
<div class="container">
    <div class="content row">
        <!-- Middle Content -->
        <div class="main-content col-md-9 col-12">
            <h2>Последние публикации</h2>

            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/images/image_2.jpg" alt="" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="#">Прикольная статья на тему программистов</a>
                    </h3>
                    <i class="far fa-user">Имя Автора</i>
                    <i class="far fa-calendar">30 марта, 2023</i>
                    <p class="preview-text">
                        Настоящий программист никогда не ставит комментариев.
                        То, что писалось с трудом, должно пониматься с трудом
                    </p>
                </div>
            </div>

            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/images/image_3.jpg" alt="" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="#">Кулинария</a>
                    </h3>
                    <i class="far fa-user">Имя Автора</i>
                    <i class="far fa-calendar">31 марта, 2023</i>
                    <p class="preview-text">
                        Кулинария - это шедевр
                    </p>
                </div>
            </div>

        </div>

        <!-- sidebar Content -->
        <div class="sidebar col-md-3 col-12">

            <div class="section search">
                <h3>Поиск</h3>
                <form action="/" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="Введите искомое слово">
                </form>
            </div>

            <div class="section topics">
                <h3>Категории</h3>
                <ul>
                    <li><a href="#">Программирование</a> </li>
                    <li><a href="#">Кулинария</a> </li>
                    <li><a href="#">Учеба</a> </li>
                </ul>
            </div>

        </div>
    </div>
</div>

<!-- Блок середины страницы END -->

<!-- footer -->


<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

</body>
</html>