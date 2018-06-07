<?php

	header('Content-Type: application/json; charset=UTF-8');

	// 接收 code
	$code = @$_GET['code'];

	// 接收 表名
	$table = $_GET['table'];

	// 1. 登录
	$connect = mysqli_connect('127.0.0.1', 'root', 'root');

	// 2. 选库
	mysqli_select_db($connect, 'study');

	// 3. SQL
	
	if($table == 'province') {
		$sql = 'SELECT * FROM ' . $table;
	} else {
		$sql = 'SELECT * FROM ' . $table . ' WHERE parentcode=' . $code;
	}

	// echo $sql;
	
	// 4. 执行
	$res = mysqli_query($connect, $sql);

	// 5. 提取
	$rows = array();
	while($row = mysqli_fetch_assoc($res)) {
		array_push($rows, $row);
	}

	echo json_encode($rows);

