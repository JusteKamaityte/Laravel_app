<?php
session_start();
define('USER', 'app/data/user.json');
define ('TEAMS_FILE', 'app/data/teams.json');
define ('DB_FILE', 'app/data/db.json');

//loadinam  pagrindines core funkcijas
require'core/functions/form/core.php';
require 'core/functions/form/validators.php';
require 'core/functions/html.php';
require 'core/functions/form/file.php';
require 'core/functions/auth.php';

//loadinam projektui specifines funkcijas
require 'app/functions/form/validators.php';



