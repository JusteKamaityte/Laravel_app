<?php
/**
 * funkcija apsauganti nuo pavojingu ivesciu(POST)
 * @param $fields
 * @return array|null
 */
function get_filtered_input(array $fields): ?array
{
    //parametrai pagal kuriuos nusako kaip reikia POST masyva isfiltruoti
    $filter_parameters = [];

    foreach ($fields as $field_id => $field_value) {
        $filter_parameters[$field_id] = FILTER_SANITIZE_SPECIAL_CHARS;
    }
    return filter_input_array(INPUT_POST, $filter_parameters);
}

var_dump(get_filtered_input($_POST));
?>

<html>
<head>
    <title>Form security</title>
    <style>
    </style>
</head>
<body>
<h1><?php print $_POST['vardas'] ?? ''; ?></h1>
<h1><?php print $_POST['pavarde'] ?? ''; ?></h1>
<h2>Hack it</h2>
<form method="POST">
    <input type="text" name="vardas">
    <input type="text" name="pavarde">
    <input type="submit">
</form>
<!--    --><?php //include 'templates/form.tpl.php'; ?>
</body>
</html>