<?php
include("app/databases/db.php");

// errMsg - заполненные поля
$errMsg = '';


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $pass = trim($_POST['password']);
    $passS = trim($_POST['pass-second']);

    if($login === '' || $email === '' || $pass === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif(mb_strlen($login, 'UTF8') < 2){
        $errMsg = "Логин должен быть больше 2-х символов";
    }elseif($pass !== $passS) {
        $errMsg = "Пароли везде должны соответствовать!";
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if($existence['email'] === $email){
            $errMsg = "Пользователь с такой почтой уже зарегистрирован!";
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
                header('location:' . BASE_URL . admin/admin.php);
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




