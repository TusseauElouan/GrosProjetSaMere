<?php
$host = '127.0.0.1';
$db = 'db_bibliotheque';
$user = 'user_bibliotheque';
$pass = 'mdp_bibliotheque';
$port = 3306;
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
$pdo = new PDO($dsn, $user, $pass);