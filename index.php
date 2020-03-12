<?php
    $name =

    $products = ['Stumbro degtinė', 'Balzamas', 'Carlsberg alus', 'Chardonay vynas'];
    $photos = ['css/degtinė.jpg', 'css/balzamas.jpg', 'css/carlsberg.jpg', 'css/chardonnay.jpg'];
    $prices = [6.49, 9.50, 2.50, 11.00];

    $percentage = rand(0, 15) .'%';
    $discount_value = ($prices / 100) * $percentage;
    $special_price = $price - $discount_value;


        $cards [] = [
            [
                'name' => $products[0],
                'price' => $price[0],
                'image' => $photos[0]
            ],
            [
                'name' => $products[1],
                'price' => $price[1],
                'price_special' => $special_price,
                'image' => $photos[1]
            ],
            [
                'name' => $products[2],
                'price' => $price[2],
                'price_special' => $special_price,
                'image' => $photos[2]
            ],
            [
                'name' => $products[3],
                'price' => $price[3],
                'price_special' => $special_price,
                'image' => $photos[3]
            ]
        ]
    ];

var_dump($special_price);
?>


<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css">
    <title>Prekės</title>
</head>
<body>
<main>
    <div class="wrapper">
        <div class="cards">
            <?php foreach ($cards as $card): ?>
                <div class="card">
                    <img src="<?php print $card['photo']; ?>">
                    <span> <?php print $card['stats']; ?></span>
                    <span><?php print $card['full_name']; ?></span>
                    <span><?php print $card['price_special']; ?> </span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>
</body>
</html>
