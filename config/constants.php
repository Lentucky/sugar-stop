<?php  
   
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);
    // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    //Start Session
    session_start();

    //create constants to store non repeating values
    define('SITEURL', 'http://localhost/food-order/');
    define('LOCALHOST', 'localhost:3307');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'food-order');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

    if(!$conn) {
        die("Connection failed: " . mysqli_connect());
    }

?>