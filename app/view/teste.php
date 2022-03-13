<?php
require_once __DIR__ . "/../service/LoginFilterService.php";

LoginFilterService::isLogged();

print_r($_SESSION);