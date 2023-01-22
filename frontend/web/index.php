<?php

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../../common/config/bootstrap.php';
require __DIR__ . '/../config/bootstrap.php';


$driver = 'mysql';
$host = 'localhost';
$db_name = 'adminbooks';
$db_user = 'root';
$db_password = '';
$charset = 'utf8';
$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

$pdo = new PDO("$driver:host=$host;charset=$charset", $db_user, $db_password, $options);
$sql = "SHOW DATABASES LIKE '$db_name'";
$db = $pdo->query($sql);
if ($db->rowCount() == 1) {
    unset($pdo);
    $pdo = new PDO("$driver:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_password, $options);
    $tb1 = $pdo->query('SHOW TABLES LIKE "users"');
    $tb2 = $pdo->query('SHOW TABLES LIKE "books"');
    if (!$tb1->rowCount() == 1) {
        $table1 = "CREATE TABLE `$db_name`.`users` (`id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(100) NOT NULL , `username` 
        VARCHAR(100) NOT NULL , `password` VARCHAR(100) NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
        PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        $pdo->query($table1);
    }
    if (!$tb2->rowCount() == 1) {
        $table2 = "CREATE TABLE `$db_name`.`books` (`id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(100) NOT NULL , `author` 
        VARCHAR(100) NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        $pdo->query($table2);
    }
} else {
    $sql = "CREATE DATABASE $db_name";
    $pdo->query($sql);
    $table1 = "CREATE TABLE `$db_name`.`users` (`id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(100) NOT NULL , `username` 
        VARCHAR(100) NOT NULL , `password` VARCHAR(100) NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
        PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    $pdo->query($table1);
    $table2 = "CREATE TABLE `$db_name`.`books` (`id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(100) NOT NULL , `author` 
        VARCHAR(100) NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    $pdo->query($table2);
    unset($pdo);
}

$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../../common/config/main.php',
    require __DIR__ . '/../../common/config/main-local.php',
    require __DIR__ . '/../config/main.php',
    require __DIR__ . '/../config/main-local.php'
);

(new yii\web\Application($config))->run();
