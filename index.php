<?php
$h1 = 'Drink Catalogue';
$price_display = ' eur';


        $cards = [
            [
                'name' => 'Stumbro degtinė',
                'price' => 6.49,
                'price_special' => 6.00,
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

    foreach($cards['price_special'] as $key => $discount){

        $discount = in_array('price_special', $cards);
//
//        if(isset($discount)){


    }


        $array = ['price' => 11.00]

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
                    <span><?php print $card['price']; ?> </span>
                    <span><?php print $card['price_special'] ; ?> </span>
                    <img src="<?php print $card['image']; ?>">
                    <span><?php print $card['name']; ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>
</body>
</html>