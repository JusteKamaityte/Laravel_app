<?php
    $name =

    $products = [
            [
                'name' => 'Stumbro degtinė',
                'price' => '6.49',
                'image' => '...'
            ],
            [
                'name' => 'Balzamas',
                'price' => '9.50',
                'price_special' => '7.99',
                'image' => '...'
            ]
    ];

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
