<?php

define("DB_SERVER", "localhost");

define("DB_USER", "root");

define("DB_PASS", "");

define("DB_NAME", "visitors");

$link = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die('can`t open database');	

?>