<?php 

// Opens a connection to the MySQL database
// Shared between all the PHP files in our application
//never place username and passwords in this file. store them in the .htaccess file so they are not visible on GITHUB

$user = getenv('MYSQL_USERNAME'); //MySQL username
$pass = getenv('MYSQL_PASSWORD'); //MySQL password

$host = getenv('MYSQL_DB_HOST');
$dbname = getenv('MYSQL_DB_NAME');

$data_source = sprintf('mysql:host=%s;dbname=%s', $host, $dbname);

//PDO: PHP Data Objects
// Allows us to connect to many different kinds of databases
$db = new PDO($data_source, $user, $pass);
// Force the connection to communicate in UTF8
// and support many human languages
$db->exec('SET NAMES utf8');