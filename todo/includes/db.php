<?php 
//create your DSN
$host = 'localhost';
$db   = 'todo';
$user = 'root';
$pass = 'jackass9';
$charset = 'utf8';
//it is important that our DSN have no spaces in it just what you need so the parameters and values.  this is alot different than some of the less secure ways to connect to the database.  this is a full course on mysql so you should know how to actually do the work not just make a toy.
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
//remember because this is PDO there is no calling a connect variable each time a query is ran there is simply an object and including the db.php file from the includes folder.
$pdo = new PDO($dsn, $user, $pass, $opt);




