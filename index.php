<?php


function cars($name, $year, $fuel, $price)
{
    return [
        'name' => $name,
        'fuel' => $fuel,
        'price' => $price,
        'year' => $year
    ];
}

function price_range($cars){
    $results = [];
    foreach ($cars as $car){
        if ($car['price'] > $min  &&  $car['price'] < $max ) {
            $results['over_1000'];
        }
    }
    return $results;
}
$cars = [
    car(name: 'Prius', year: 2000, fuel: 'petrol', price: 1000),
    car(name: 'Toyota', year: 2005, fuel: 'gasoline', price: 3000),
    car(name: 'Honda', year: 2010, fuel: 'petrol', price: 1000),
];

function magic_rabit($x) {
    $x = 4;
    return $x;

}
print magic_rabit(2);
var_dump($magic_rabit);
//var_dump($price(min:1000, max:2000, $cars));
?>


<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css">
    <title>Cars</title>
</head>
<body>
<p><?php print $p1 ?></p>
<p><?php print $p2 ?></p>
<p><?php print $p3 ?></p>
</body>
</html>
