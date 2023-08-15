<?php
include SITE_ROOT . "/app/databases/db.php";

// errMsg - заполненные поля
$errMsg = [];

// Код для формы регистрации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){

    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $pass = trim($_POST['password']);
    $passS = trim($_POST['pass-second']);

    if($login === '' || $email === '' || $pass === ''){
        array_push($errMsg,  "Не все поля заполнены!");
    }elseif(mb_strlen($login, 'UTF8') < 2){
        array_push($errMsg, "Логин должен быть больше 2-х символов");
    }elseif($pass !== $passS) {
        array_push($errMsg, "Пароли везде должны соответствовать!");
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if(is_array($existence) && $existence['email'] === $email){
            array_push($errMsg, "Пользователь с такой почтой уже зарегистрирован!");
        }else{
            $pas = password_hash($pass, PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pas,
            ];
            $id = insert('users', $post);
            $user = selectOne('users', ['id' => $id]);

             $_SESSION['id'] = $user['id'];
             $_SESSION['login'] = $user['username'];
             $_SESSION['admin'] = $user['admin'];

             if ($_SESSION['admin']){
                header('location:' . BASE_URL . "admin/posts/admin.php");
             }else{
                header('location: ' . BASE_URL);
            }
        }
    }
}else{
    // Пишем 2 строчки, если проверку по полям не пройдет, то в след.раз эти строчки в регистрации он запомнит
    $login = '';
    $email = '';
}

//Код для формы авторизации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])){

    $email = trim($_POST['mail']);
    //тут может быть ошибка
    $pas = trim($_POST['password']);

    if($email === '' || $pas === '') {
        array_push($errMsg, "Не все поля заполнены!");
    }else {
        $existence = selectOne('users', ['email' => $email]);
        if($existence && password_verify($pas, $existence['password'])){
            $_SESSION['id'] = $existence['id'];
            $_SESSION['login'] = $existence['username'];
            $_SESSION['admin'] = $existence['admin'];

            if ($_SESSION['admin']){
                header('location:' . BASE_URL . "admin/posts/index.php");
            }else{
                header('location: ' . BASE_URL);
            }

            echo 'Авторизовать';
        }else{
            array_push($errMsg,  "Почта либо пароль введены неверно!");
        }
    }
}else{
    $email = '';
}

// Код добавления пользователя в админке
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])){


    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $pass = trim($_POST['password']);
    $passS = trim($_POST['pass-second']);

    if($login === '' || $email === '' || $pass === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }elseif(mb_strlen($login, 'UTF8') < 2){
        array_push($errMsg, "Логин должен быть больше 2-х символов");
    }elseif($pass !== $passS) {
        array_push($errMsg, "Пароли везде должны соответствовать!");
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if(is_array($existence) && $existence['email'] === $email){
            array_push($errMsg, "Пользователь с такой почтой уже зарегистрирован!");
        }else{
            $pas = password_hash($pass, PASSWORD_DEFAULT);
            if (isset($_POST['admin'])) $admin = 1;
            $user = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pas,
            ];
            $id = insert('users', $user);
            $user = selectOne('users', ['id' => $id]);

            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['username'];
            $_SESSION['admin'] = $user['admin'];

            if ($_SESSION['admin']){
                header('location:' . BASE_URL . "admin/posts/admin.php");
            }else{
                header('location: ' . BASE_URL);
            }
        }
    }
}else{
    // Пишем 2 строчки, если проверку по полям не пройдет, то в след.раз эти строчки в регистрации он запомнит
    $login = '';
    $email = '';
}



