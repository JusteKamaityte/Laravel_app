<?php
    $participants = [
        [
            'name' => 'Bimbis Pongas',
            'bike'=> ' css/assets/image_1.jpg'
        ],
        [
            'name' => 'Bimbis Pongas',
            'bike'=> ' .jpg'
        ],
        [
            'name' => 'Bimbis Pongas',
            'bike'=> ' .jpg'
        ],
        [
            'name' => 'Bimbis Pongas',
            'bike'=> ' .jpg'
        ],
        [
            'name' => 'Bimbis Pongas',
            'bike'=> ' .jpg'
        ],
        [
            'name' => 'Bimbis Pongas',
            'bike'=> ' .jpg'
        ]
    ];
$leader= null;

foreach ($participants as $participant){
 $x = rand(0, 200);
 $y = rand(0,200);
//
// if ($x=0 $x > 100) {
//    $participant['name']
// }
}

var_dump($participants);
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
    <div class="wrapper">
            <?php foreach ($participants as $participant): ?>
                <h2> Current Leader:<?php print $participant['name']; ?></h2>
                <img src="<?php print $participants ['bike']; ?>">
            <?php endforeach; ?>
    </div>
</main>
</body>
</html>
