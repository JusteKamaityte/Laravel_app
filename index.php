<?php
//filtras apsaugantis nuo nereikalingų simbolių
$input = filter_input_array(INPUT_POST,[
    'vardas' => FILTER_SANITIZE_SPECIAL_CHARS,
    'pavarde' => FILTER_SANITIZE_SPECIAL_CHARS,
]);

var_dump($input);

?>

<html>
<head>
    <title>Hack</title>
    <style>
    </style>
</head>
<body>
    <h1><?php print $input['vardas']; ?></h1>
    <h2>Hack it</h2>
    <form method="POST" >
        <input type="text" name="vardas">
        <input type="text" name="pavarde">
        <input type="submit">
    </form>
</body>
</html>