<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

define('SITEPATH', __DIR__);
include_once '../../amadeus/framework/entry.php';

am_var('flavour', 'yieldmore');
runCode('cms');
