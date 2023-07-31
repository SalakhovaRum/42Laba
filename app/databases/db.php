<?php

require('connect.php');

function tt($value){
    echo '<pre>';
    print_r($value);
    echo '</pre';
}

function selectAll($table){
    global $pdo;
    // SQL - запрос
    $sql = "SELECT * from $table";
    // Подготовка запроса
    $query = $pdo->prepare($sql);
    // Отправляем сам запрос
    $query->execute();
    // Проверка на ошибки
    $errInfo = $query->errorInfo();

    if ($errInfo[0] !== PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }

// Получение данных
    return $query->fetchAll();
}

tt(selectAll('users'));

