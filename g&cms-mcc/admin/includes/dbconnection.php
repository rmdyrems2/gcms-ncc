<?php
// DB credentials.
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root12345');
define('DB_NAME', 'g&cms-mcc');
// Establish database connection.
try {
      // try to create a new PDO instance, connecting to the MySQL database using the constants defined in dbconfig.php

      $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
      // if an exception is caught, print an error message and exit the script

      exit("Error: " . $e->getMessage());
}
?>