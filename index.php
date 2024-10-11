<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once '../../amadeus/framework/entry.php';
define('SITEPATH', __DIR__);
am_var('flavour', 'yieldmore');
runCode('cms');
?>
