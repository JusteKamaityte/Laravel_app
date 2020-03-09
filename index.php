<?php
$h1 = 'Participants';

    $participants = [

        'names' => ['Justė', 'Algis', 'Saulius', 'Petras', 'Tomas', 'Linas'],
        'last_names' => ['Kamaitytė', 'Algirdauskas', 'Bolauskas', 'Petrauskas', 'Tomauskas', 'Linauskas'],
        'images' => ['css/assets/image_1.jpg', 'css/assets/image.jpg', 'assets/image.jpg', 'assets/image.jpg', 'assets/image.jpg', 'assets/image.jpg']
//            result[],
//            percentage[]

    ];

//    for $participants
//    foreach ($participants as $value)

    $key = array_rand($participants);

    var_dump($participants);

    for ($participants = 0 ; $participants > 6 ; ++$participants)

?>



<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
    <title>Team</title>

</head>
<body>
<?php print $h1; ?>
<div class="cards">
    <?php foreach ($participants as $participant): ?>
    <div class="card">
        <img src="<?php print $participants[rand(0,3)]['images'] ?>">
        <h2><?php print $participants[rand(0,3)]['names']; ?></h2>
        <h2><?php print $participants[rand(0,3)]['last_names']; ?></h2>
    </div>
    <?php endforeach; ?>
</div>
</body>
</html>
