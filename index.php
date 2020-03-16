<?php
$h1 = 'War';

$fights = [
    'soldiers'[
        'my_soldier'=
        'hedge'=
            ['enemy_soldier'=]



];

//print $cards[0]['price_special'];

foreach ($cards as $key => $card) {

    if (isset($card['price_special'])) {
        $discount = round(100 - $card['price_special'] / $card['price'] * 100) . ' eur';
        $cards[$key]['discount'] = $discount;

        $cards[$key]['price_display'] = $card['price_special'];

        var_dump($discount);

    } else {
        $cards[$key]['price_display'] = $card['price'];
    }


    if ($card['instock'] > 0) {

        $cards[$key]['instock_text'] = 'Yra sandėlyje';

    } else {
        $cards[$key]['instock_text'] = 'Nėra sandėlyje';
    }

    if($card['instock']  < 0) {

        $cards[$key]['instock_class'] = '...';
    }

}

?>


<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css">
    <title>Prekės</title>
</head>
<body>
<main>
    <h1><?php print $h1; ?></h1>
    <h2><?php print $h2; ?></h2>
    <div class="fights-container">
        <?php foreach ($fights as $fight): ?>
            <div class="fight">
                <div class="my_soldier">M</div>
                <div class="hedge">-</div>
                <?php for($i=0; $i < $fight['enemies_down']; $i++): ?>
                    <div class="enemy_soldier">E</div>
                <?php endfor; ?>
            </div>
    </div>
</main>
</body>
</html>