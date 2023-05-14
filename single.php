<?php include("path.php"); ?>
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

<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>
                    <a href="/">Information portal</a>
                </h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li><a href="#">Главная</a> </li>
                    <li><a href="#">О нас</a> </li>
                    <li>
                        <a href="#">
                            <i class="fa-solid fa-bars"></i>
                            Сервисы
                        </a>
                        <ul>
                            <li><a href="#">Создание блога</a> </li>
                            <li><a href="#">Отзывы и предложения</a> </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-user"></i>
                            Кабинет
                        </a>
                        <ul>
                            <li><a href="#">Админ панель</a> </li>
                            <li><a href="#">Выйти</a> </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>



<!-- Блок середины страницы START-->
<div class="container">
    <div class="content row">
        <!-- Middle Content -->
        <div class="main-content col-md-9 col-12">
            <h2>Заголовок какой-то конкретной статьи</h2>

            <div class="single_post row">
                <div class="img col-12">
                    <img src="assets/images/image_2.jpg" alt="" class="img-thumbnail">

                </div>
                <div class="info">
                    <i class="far fa-user">Имя Автора</i>
                    <i class="far fa-calendar">30 марта, 2023</i>
                </div>
                <div class="single_post_text col-12">
                    <h3>Кто такой программист? </h3>
                    <p>
                        За термином «программист» могут скрываться узкопрофильные программисты, разработчики программного обеспечения, инженеры, системные аналитики и т.д
                    </p>
                    <p>
                        Тем не менее, всех программистов объединяет одно — умение облечь человеческие требования в машинный код, чтобы сделать труд или развлечение автоматизированным, удобным, простым.
                    </p>
                    <p>
                        Вам стоит задуматься, не будущий ли программист вы, если…

                        … ваша мотивация исходит изнутри, вам нравится процесс управления компьютером, вы хотите не просто использовать программу (игру, приложение), но и знать, как она работает, модифицировать её.
                    </p>
                    <h3>Мифы профессии</h3>
                    <h5>Программисты гребут деньги лопатой.</h5>
                    <p>
                        Нет. Чтобы пройти путь до зарплаты выше рынка, нужно получить более низкую зарплату, а иногда так даже пройти бесплатную стажировку — не ради денег, а ради знаний, навыков и связей. На высоких позициях заработные платы действительно могут достигать 500 тыс. рублей в месяц, и к этому нужно стремиться.
                    </p>
                    <h5>Программистов заменят роботы.</h5>
                    <p>
                        Буду краток. А кто роботов будет программировать? ;-)
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
<?php include("app/include/footer.php"); ?>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

</body>
</html>