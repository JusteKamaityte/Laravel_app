<?php
declare(strict_types=1);
session_start();
define ('ROOT', __DIR__);
define ('DB_FILE', ROOT.'/app/data/db.json');

//loadinam  pagrindines core funkcijas
require 'core/functions/form/core.php';
require 'core/functions/form/validators.php';
require 'core/functions/html.php';
require 'core/functions/form/file.php';
require 'core/functions/auth.php';
require 'vendor/autoload.php';

//loadinam projektui specifines funkcijas
require 'app/functions/form/validators.php';

$app = new App\App();
$session = new Core\Session();
//unset ($app);
