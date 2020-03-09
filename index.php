<?php

$h1 = 'Participants';


        $names = ['Justė', 'Algis', 'Saulius', 'Petras', 'Tomas'];
        $balls = [0, 1, 2, 3, 4];

        for ($i = 0 ; $i <3; $i++){
            $name_key = array_rand($names);
            $name = $names[$name_key];

            $balls_key = array_rand($balls);
            $balls_count = $balls[$balls_key];

            $cards= [] =[
                'person_info' => "$name - $balls_count";
            ];
        }

//        $cards= [
//            ['person_info' => 'Petras - 2 '],
//            ['person_info' => 'Tomas - 2 '],
//        ];
?>



<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
    <title>Team</title>

</head>
<body>
    <?php foreach ($cards as $card): ?>
        <div class="card">
            <span><?php print $card [0]; ?></span>
        </div>
    <?php endforeach; ?>
</body>
</html>
