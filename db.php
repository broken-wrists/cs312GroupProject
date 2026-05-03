<?php
define('DB_HOST', 'helmi');
define('DB_USER', 'username');
define('DB_PASS', 'password');
define('DB_NAME', 'username');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("<p class='error'>Database connection failed: " . $conn->connect_error . "</p>");
}




// steps to complete 
// log into mysql and add this table
/*
 CREATE TABLE IF NOT EXISTS colors (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name VARCHAR(100) UNIQUE NOT NULL,
    hex_value VARCHAR(7) UNIQUE NOT NULL
);
*/


?>