<?php
    header('Content-Type: application/json; charset=UTF-8;');
    $code = @$_GET['code'];
    $table = $_GET['table'];
    // 1. 连接
    $connect = mysqli_connect('localhost', 'root', 'root'); 
    // 2. 选库
    mysqli_select_db($connect, 'study');
    // 3. sql
    if($_GET['table'] == 'province') {
        $sql = 'SELECT * FROM ' . $table;
    } else {
        $sql = 'SELECT * FROM ' . $table . ' WHERE parentcode=' . $code;
    }
    // 4. 执行sql
    $res = mysqli_query($connect, $sql);
    // 5. 取值
    $rows = array();
    while($row = mysqli_fetch_assoc($res)) {
        array_push($rows, $row);
    };
    
    echo json_encode($rows);