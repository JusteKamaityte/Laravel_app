<?php
    $participants = [
        [
            'name' => 'Bimbis Pongas',
            'bike'=> ' .jpg'
        ]
    ]

foreach ($participants as $participant)
?>


<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css">
    <title>Team</title>

</head>
<body>
<main>
    <nav></nav>
    <h1>Tour-De</h1>
    <h2> Current Leader: </h2>
    <div class="wrapper">
        <div class="cards">
            <?php foreach ($cards as $card): ?>
                <div class="card">
                    <img src="<?php print $card ['photo']; ?>">
                    <span> <?php print $card['stats']; ?></span>
                    <span><?php print $card['full_name']; ?></span>
                    <span><?php print $card['win_percentage']; ?> </span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>
</body>
</html>
