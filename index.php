<?php
/**
 *
 * @param array $attr
 * @return array
 */
function html_attr(array $attr): string
{
    $attributes = '';

    foreach ($attr as $index => $value) {
        $attributes .= "$index=\"$value\" ";


    }
    return $attributes;
}

$form = [
    'attr' => [
        'action' => 'index.php',
        'method' => 'POST',
        'class' => 'my-form',
    ]
];



var_dump(html_attr($form['attr']));
var_dump($form);
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