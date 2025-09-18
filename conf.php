<?php
// Site configuration
$conf['site_name'] = "BBIT DevOps";
$conf['site_email'] = "info@bbit.edu";
$conf['site_url'] = "http://localhost/dol";

// Site language
$conf['language'] = "en";

// Database constants
$conf['db_type'] = "mysqli"; // Use mysqli since you’re using mysqli connection
$conf['db_host'] = "localhost";
$conf['db_user'] = "root";
$conf['db_pass'] = "MariaDB"; // replace with your actual password
$conf['db_name'] = "TaskApp";

// Create a new mysqli connection
$mysqli = new mysqli(
    $conf['db_host'], 
    $conf['db_user'], 
    $conf['db_pass'], 
    $conf['db_name']
);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Email configuration
$conf['mail_type'] = "smtp"; // Options: smtp, sendmail, mail
$conf['smtp_host'] = "smtp.gmail.com";
$conf['smtp_user'] = "your_email@gmail.com";
$conf['smtp_pass'] = "your_app_password";
$conf['smtp_port'] = 465;
$conf['smtp_secure'] = "ssl";
?>
