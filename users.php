<?php
$table = [
    'head' => [
        'username',
        'password',
    ],
    'rows' => [

    ]
];

//$table['rows'] = file_to_array('db_file.txt');
//var_dump(file_to_array(db_file));
//var_dump($table['rows']);
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

