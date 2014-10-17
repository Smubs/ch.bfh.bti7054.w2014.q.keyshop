<?php

$key = 'zcU5JYYa77';
if (!isset($_GET['key']) || $_GET['key'] !== $key) {
    die('Wrong key');
}

$mysqli = mysqli_connect('127.0.0.1', 'keyshopsql1', 'DYxM2FmYzU', 'keyshopsql1');
if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}

$mysqli->query('SET foreign_key_checks = 0');

if ($result = $mysqli->query('SHOW TABLES')) {
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        $mysqli->query('DROP TABLE IF EXISTS ' . $row[0]);
    }
}

$sql = file_get_contents('db_dump.sql');
if (!$sql){
    die ('Error opening file');
}
$mysqli->multi_query($sql);

$mysqli->query('SET foreign_key_checks = 1');
$mysqli->close();
