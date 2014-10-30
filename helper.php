<?php

function get($var, $default=False) {
    $val = $default;
    if (isset($_GET[$var])) {
       	$val = $_GET[$var];
    }
    return $val;
}

?>
