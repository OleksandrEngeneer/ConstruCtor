<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
require_once __DIR__ . "/view/bootstrap.php";
set_error_handler(noticeErrors(), E_ALL);
