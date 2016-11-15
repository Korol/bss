<?php
$db = require(__DIR__ . '/db.php');
$dsn = $db['dsn'] . ';charset=' . $db['charset'];
$opt = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
$pdo = new PDO($dsn, $db['username'], $db['password'], $opt);
$data = $pdo->query('SELECT `url` FROM `language` WHERE `enabled` = 1 ORDER BY `id` ASC')
    ->fetchAll(PDO::FETCH_COLUMN);
return (!empty($data)) ? $data : ['ru', 'en', 'ua', 'de'];