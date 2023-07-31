<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>
                    <a href="<?php echo BASE_URL ?>">Information portal</a>
                </h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li><a href="<?php echo BASE_URL ?>">Главная</a> </li>
                    <li><a href="<?php echo BASE_URL . 'about.php' ?>">О нас</a> </li>
                    <li>
                        <a href="#">
                            <i class="fa-solid fa-bars"></i>
                            Сервисы
                        </a>
                        <ul>
                            <li><a href="single.php">Создание блога</a> </li>
                            <li><a href="#">Отзывы и предложения</a> </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-user"></i>
                            Кабинет
                        </a>
                        <ul>
                            <li><a href="login.php">Админ панель</a> </li>
                            <li><a href="#">Выйти</a> </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>