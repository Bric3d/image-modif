<?php
function escape($string, $sql){return mysql_real_escape_string($string, $sql);}