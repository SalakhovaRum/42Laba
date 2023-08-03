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
                        <?php if (isset($_SESSION['id'])): ?>
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <?php echo $_SESSION['login']; ?>
                            </a>
                            <ul>
                                <?php if ($_SESSION['admin']): ?>
                                    <li><a href="#">Админ панель</a> </li>
                                <?php endif; ?>
                                <li><a href="<?php echo BASE_URL . "logout.php"; ?>">Вышел и зашел нормально:)</a> </li>
                            </ul>
                        <?php else: ?>
                            <a href="<?php echo BASE_URL . "login.php"; ?>">
                                <i class="fa fa-user"></i>
                                Войти
                            </a>
                            <ul>
                                <li><a href="<?php echo BASE_URL . "reg.php"; ?>">Регистрация</a> </li>
                            </ul>
                        <?php endif; ?>

                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>