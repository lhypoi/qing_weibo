<?php

error_reporting(~E_NOTICE);
session_start();

require_once 'init.php';

$baseControl = new baseControl();
$baseControl->run();

 ?>