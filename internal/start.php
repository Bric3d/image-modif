<?php

// Defaults values

error_reporting(E_ALL);
ini_set("display_errors", 1);
date_default_timezone_set('Europe/Paris');

require('./config/config.php');
if ($timezone_identifier != null)
    date_default_timezone_set($timezone_identifier);
if ($error_log_path != null)
    ini_set('error_log', $error_log_path);

/* Debug Functions */
if ($debug === true) {
    require('./internal/debug.php');
}
else {
    error_reporting(0);
    ini_set("display_errors", 0);
}

/* Database */
require('./internal/database.php');
$bdd = bdd($db_dsn, $db_name, $bdd_username, $bdd_password);

/* Router */
if (file_exists($_SERVER["DOCUMENT_ROOT"] . $_SERVER["REQUEST_URI"])) {
    return false;
}
else {
    error_log("\e[91minvalid url: " . $_SERVER["REQUEST_URI"] . "\e[0m");
    header('Location: /');
}
?>