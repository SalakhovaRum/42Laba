<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require('connect.php');

function tt($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
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

//Запись в таблицу БД
function insert($table, $params){
    global $pdo;
    //INSERT INTO `users` (admin, username, email, password) VALUES ( '1', 'Ilnar', 'I@mail.ru', '090680');
    // Посчитать цикл
    $i = 0;
    // Создать колонку
    $coll = '';
    // В эту колонку подставить значения
    $mask = '';
    foreach ($params as $key => $value){
        if ($i === 0){
            $coll = $coll . "$key";
            $mask = $mask ."'" . "$value"."'";
        }else{
            $coll = $coll . ", $key" ;
            $mask = $mask . ", '" . "$value" . "'";
        }
        $i++;
    }

    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";
    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
    return $pdo->lastInsertId();
}


// Обновления строки в таблице
function update($table, $id, $params){
    global $pdo;
    // Посчитать цикл
    $i = 0;
    $str = '';
    foreach ($params as $key => $value){
        if ($i === 0){
            $str = $str . $key . " = '" . $value."'";
        }else{
            $str = $str .", ". $key . " = '" . $value . "'";
        }
        $i++;
    }

    // UPDATE 'users' set username='test', password = '55555' WHERE 'id'=14
    $sql = "UPDATE $table SET $str WHERE id = $id";
    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}

// Функция удаления
function delete($table, $id){
    global $pdo;
    // DELETE FROM 'users' WHERE id = 8
    $sql = "DELETE FROM $table WHERE id =". $id;
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

// Выборка постов с автором в админку через JOIN(обьединение 2 таблиц)
    function selectAllFromPostsWithUsers($table1, $table2){
    global $pdo;
    $sql = "SELECT 
    t1.id, 
    t1.title,
    t1.img,
    t1.content,
    t1.status,
    t1.id_topic,
    t1.created_date,
    t2.username
    FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
    }


// Выборка записей с автором на главную
function selectAllFromPostsWithUsersOnIndex($table1, $table2){
    global $pdo;
    $sql = "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.status=1";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}


// Выборка TOP записей с автором на главную
function selectTopTopicFromPostsOnIndex($table1){
    global $pdo;
    $sql = "SELECT * FROM $table1 WHERE id_topic = 15";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// Поиск по заголовкам и содержимому
function searchInTittleAndContent($text, $table1, $table2){
    $text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));
    global $pdo;
    $sql = "SELECT
        p.*, u.username
        FROM $table1 AS p
        JOIN $table2 AS u 
        ON p.id_user = u.id 
        WHERE p.status=1
        AND p.title LIKE '%$text%' OR p.content LIKE '%$text%'";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}