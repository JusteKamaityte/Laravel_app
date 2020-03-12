<?php
$h1 = 'Drink Catalogue';
$price_display =  '';

        $cards = [
            [
                'name' => 'Stumbro degtinė',
                'price' => 6.49,

                'image' =>'css/degtinė.jpg'
            ],
            [
                'name' => 'Balzamas',
                'price' =>  9.50,
                'price_special' => 8.00,
                'image' => 'css/balzamas.jpg'
            ],
            [
                'name' => 'Carlsberg alus',
                'price' => 2.50,
                'price_special' => 1.90,
                'image' => 'css/carlsberg.jpg'
            ],
            [
                'name' => 'Chardonay vynas',
                'price' => 11.00,
                'price_special' => 10.50,
                'image' => 'css/chardonnay.jpg'
            ]
    ];

        print $cards[0]['price_special'];

    foreach($cards as $key => $card){

        if(isset($card['price_special'])){
            $discount = round(100 - $card['price_special']  / $card['price'] * 100) . ' &euro';

            $cards[$key]['discount'] = $discount;

            $cards[$key]['price_display'] = $card['price_special'];

            var_dump($discount);
        }

        else{
            $cards[$key]['price_display'] = $card['price'];
        }

    }
var_dump($cards);



?>


<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css">
    <title>Prekės</title>
</head>
<body>
<main>
    <h1><?php $h1; ?></h1>
    <div class="wrapper">
        <div class="cards">
            <?php foreach ($cards as $card): ?>
                <div class="card">
                    <?php if (isset($card['discount'])): ?>
                        <span><?php print $card['discount']; ?> </span>
                    <?php endif ; ?>

                    <span><?php print $card['price_display']; ?> </span>

                    <img src="<?php print $card['image']; ?>">
                    <span><?php print $card['name']; ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>
</body>
</html>