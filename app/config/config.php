<?php
use Model\Utilities\Log;

// - - - - - [ INIT ]

if(!file_exists('./app/errors'))
{
    mkdir('./app/errors', 0777, true);    
}

define('SITE_URL', 'localhost');

define('APP_ROOT', dirname(dirname(__FILE__)));
define('ERRORS', APP_ROOT . '/errors');
define('GMT', '+3'); // << - - - SET YOUR TIMEZONE HERE
define('APP_NAME', 'Test EventSource'); // << - - - SET YOUR APP'S NAME HERE

?>