<?php
$table = [
    'head' => [
        'username',
        'password',
    ],
    'rows' => [

    ]
];

$table['rows'] [] = file_to_array(DB_FILE);
var_dump(file_to_array(DB_FILE));
var_dump($table['rows']);
?>


<html>
<head>
    <title>Table</title>
    <style>
    </style>
</head>
<body>
<h1></h1>
<?php include 'core/templates/table.tpl.php'; ?>
</body>
</html>

