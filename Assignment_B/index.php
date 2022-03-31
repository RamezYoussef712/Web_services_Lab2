<?php

session_start();
require "vendor/autoload.php";

$api = new ApiHelper();
$data = $api->get();


