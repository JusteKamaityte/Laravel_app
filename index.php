<?php
/**
 *
 * @param array $attr
 * @return array
 */
function html_attr(array $attr): array
{
    foreach ($attr as $key => $value) {

        $attr = '';


    }
    return $attr;
}

$form = [
    'attr' => [
        'action' => 'index.php',
        'method' => 'POST',
        'class' => 'my-form',
    ]
];

$attr = html_attr();

?>

<html>
<head>
    <title>formų generavimas iš template</title>
    <style></style>

</head>
<body>
<?php include 'templates/form.tpl.php'; ?>
</body>
</html>