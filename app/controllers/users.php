<?php
include("app/databases/db.php");

$isSubmit = false;
// errMsg - заполненные поля
$errMsg = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $pass = trim($_POST['password']);
    $passS = trim($_POST['pass-second']);

    if($login === '' || $email === '' || $pass === '') {
        $errMsg = 'Не все поля заполнены!';
    }elseif (mb_strlen($login, 'UTF8')<2) {
        $errMsg = "Логин должен быть больше 2-х символов";
    }elseif ($pass !== $passS){
        $errMsg = "Пароли везде должны соответствовать!";
    }else {
        $pas = password_hash($pass, PASSWORD_DEFAULT);
        $post = [
            'admin' => $admin,
            'username' => $login,
            'email' => $email,
            'password' => $pas,
        ];
        $id = insert('users', $post);

    }
    //    $last_row = selectOne('users', ['id' => $id]);
}else{
    echo 'GET';
    // Пишем 2 строчки, если проверку по полям не пройдет, то в след.раз эти строчки в регистрации он запомнит
    $login = '';
    $email = '';
}



//    $pass = password_hash($_POST['pass-second'],PASSWORD_DEFAULT);

