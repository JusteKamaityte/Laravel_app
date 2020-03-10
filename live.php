<?php
$title = 'Tour-De-Pzdc';

$names = ['Algis', 'Saulius', 'Petras', 'Jonas', 'Linas', 'Tomas'];
$last_names = ['Algirdauskas', 'Sauliauskas', 'Petrauskas', 'Jonauskas', 'Linauskas', 'Tomauskas'];
$images = ['bike1.png', 'bike2.png', 'bike3.png', 'bike4.png', 'bike5.png', 'bike6.png'];

$participants = [];

    for ($i = 0; $i < 6; $i++) {
        $rand_name_key = array_rand($names);
        $rand_last_key = array_rand($last_names);
        $rand_image_key = array_rand($images);

    $participant = [
        'name' => $names[$rand_name_key],
        'last_name' => $last_names[$rand_last_key],
        'image' => "css/assets/$images[$rand_image_key]",
        'x' => rand(0, 800),
        'y' => rand(0, 800)
    ];


    if (isset($leader)) {

    if ($participant['x'] > $leader['x']) {
    $leader = $participant;
    }
    } else {

    $leader = $participant;
    }

    $participants[] = $participant;

    unset($names[$rand_name_key]);
    unset($last_names[$rand_last_key]);
    unset($images[$rand_image_key]);
}

?>

<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/live.css">
    <title><?php print $title; ?></title>
</head>
<body>
<?php include 'templates/nav.php'; ?>
<main>
    <div class="wrapper">
        <div class="live-bg">
            <div class="live">
                <span>LIVE</span>
            </div>
            <div class="leader">
                <h2>Current LEADER: <?php print "{$leader['name']} {$leader['last_name']}"; ?></h2>
            </div>
            <?php foreach ($participants as $participant): ?>
                <img class="image" src="<?php print $participant['image']; ?>" style="left: <?php print $participant['x']; ?>">
            <?php endforeach; ?>
        </div>
    </div>
</main>
</body>
</html>


