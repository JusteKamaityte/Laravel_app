<?php
//loadinam  pagrindines core funkcijas
require'core/functions/form/core.php';
require 'core/functions/form/validators.php';
require 'core/functions/html.php';
require 'core/functions/form/file.php';

require 'core/functions/table/core.php';
require 'core/functions/table/validators.php';

//loadinam projektui specifines funkcijas
require 'app/functions/form/validators.php';
require 'app/functions/table/validators.php';

define ('DB_FILE', 'app/data/db.json');

