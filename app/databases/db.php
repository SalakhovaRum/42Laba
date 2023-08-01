<?php

require('connect.php');

function tt($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

// Проверка на ошибки
function dbCheckError($query){
    $errInfo = $query->errorInfo();

    if ($errInfo[0] !== PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
    return true;
}

// Запрос на получение данных c одной таблицы
function selectAll($table, $params = []){
    global $pdo;
    // SQL - запрос
    $sql = "SELECT * from $table";

    if (!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if (!is_numeric($value)){
                $value = "'".$value."'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }else{
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }

    }

    // Подготовка запроса
    $query = $pdo->prepare($sql);
    // Отправляем сам запрос
    $query->execute();
    dbCheckError($query);
// Получение данных
    return $query->fetchAll();
}


// Запрос на получение данных c одной строки с выбранной таблицы
function selectOne($table, $params = []){
    global $pdo;
    // SQL - запрос
    $sql = "SELECT * from $table";

    if (!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if (!is_numeric($value)){
                $value = "'".$value."'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }else{
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }

    }
//    $sql = $sql . " LIMIT 1 ";
    // Подготовка запроса
    $query = $pdo->prepare($sql);
    // Отправляем сам запрос
    $query->execute();
    dbCheckError($query);
// Получение данных
    return $query->fetch();
}

$params = [
    'admin' => 1,
    'email' => 'littleangel03@mail.ru'
];

//tt(selectAll('users', $params));

tt(selectOne('users'));