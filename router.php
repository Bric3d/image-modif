<?php

/* Debug Functions */
include('./elements/debug.php');

if (file_exists($_SERVER["DOCUMENT_ROOT"] . $_SERVER["REQUEST_URI"])) {
    return false;
} else {
    header('Location: /');
    error_log("\e[91minvalid url: " . $_SERVER["REQUEST_URI"] . "\e[0m");
}
?>