<?php

define('CLASSES_FOLDER', 'classes');
define('CONFIG_FOLDER', 'config');
define('CONTROLLERS_FOLDER', 'controllers');
define('LOGS_FOLDER', 'logs');
define('PDFS_FOLDER', 'pdfs');
define('VENDORS_FOLDER', 'vendors');
define('VIEWS_FOLDER', 'views');

define('ROOT_DIR', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);

define('CLASSES_DIR', ROOT_DIR . CLASSES_FOLDER . DIRECTORY_SEPARATOR);
define('CONFIG_DIR', ROOT_DIR . CONFIG_FOLDER . DIRECTORY_SEPARATOR);
define('CONTROLLERS_DIR', ROOT_DIR . CONTROLLERS_FOLDER . DIRECTORY_SEPARATOR);
define('LOGS_DIR', ROOT_DIR . LOGS_FOLDER . DIRECTORY_SEPARATOR);
define('PDFS_DIR', ROOT_DIR . PDFS_FOLDER . DIRECTORY_SEPARATOR);
define('VENDORS_DIR', ROOT_DIR . VENDORS_FOLDER . DIRECTORY_SEPARATOR);
define('VIEWS_DIR', ROOT_DIR . VIEWS_FOLDER . DIRECTORY_SEPARATOR);

define('ROOT_URI', '/');

define('CLASSES_URI', ROOT_URI . CLASSES_FOLDER . '/');
define('CONFIG_URI', ROOT_URI . CONFIG_FOLDER . '/');
define('CONTROLLERS_URI', ROOT_URI . CONTROLLERS_FOLDER . '/');
define('LOGS_URI', ROOT_URI . LOGS_FOLDER . '/');
define('PDFS_URI', ROOT_URI . PDFS_FOLDER . '/');
define('VENDORS_URI', ROOT_URI . VENDORS_FOLDER . '/');
define('VIEWS_URI', ROOT_URI . VIEWS_FOLDER . '/');
