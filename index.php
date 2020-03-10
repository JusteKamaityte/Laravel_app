<?php
$nav = [];

$h1 = 'Participants';


$names = ['Algis', 'Saulius', 'Petras', 'Jonas', 'Linas', 'Tomas'];
$last_names = ['Algirdauskas', 'Sauliauskas', 'Petrauskas', 'Jonauskas', 'Linauskas', 'Tomauskas'];
$photos = ['css/assets/bike1.png', 'css/assets/bike2.png', 'css/assets/bike3.png', 'css/assets/bike4.png', 'css/assets/bike5.png', 'css/assets/bike6.png'];

for ($i = 0; $i < 6; $i++) {
    $name_key = array_rand($names);
    $name = $names[$name_key];
    unset ($names[$name_key]);

    $photo_key = array_rand($photos);
    $photo = $photos[$photo_key];
    unset($photos[$photo_key]);

    $last_name_key = array_rand($last_names);
    $last_name = $last_names[$last_name_key];
    unset ($last_names[$last_name]);

    $wins = rand(0, 10);
    $lost = rand(0, 10);

    $stats = "W/L: $wins/$lost";
    $win_percentage = $wins/($wins + $lost) * 100;

    $cards[] = [
        'full_name' => $name . $last_name ,
        'photo' => $photo,
        'stats' => $stats,
        'win_percentage'=> round($win_percentage) .'%'
    ];
}


?>


<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css">
    <title>Team</title>
</head>
<body>
<?php include 'templates/nav.php'; ?>
<main>
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
