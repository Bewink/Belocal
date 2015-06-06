<?php
error_reporting(-1);
ini_set('display_errors', 1);

require('config/config.php');
require('config/autoloader.php');

\classes\Router::the()->dispatch();
