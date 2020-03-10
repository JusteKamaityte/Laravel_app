<?php
//if($_SERVER['SCRIPT_NAME']=="/home.php") {
//    class="active";
//}
//
//    if (isset($active)) {
//
//    if($nav)
//}

$nav[
    [
        'url'=> '/',
        'title' => 'Home',
        'links'=> [
            [
            'url'=> '/dropdown1.php',
            'title'=> 'Dropdown 1'
            ],
            [
            'url'=> '/dropdown2.php',
            'title'=> 'Dropdown 2'
            ]
         ]
      ]
    ];

// if($_SERVER['SCRIPT_NAME']=="/home.php") {
//     class="active";
// }



foreach ($nav as $pagestring => $text){
    $active = ($pagestring == $page? ' class="active"' : '');
    echo '<li' . $active . '><a href="?page=' . $pagestring . '">' . $text . '</a></li>';
}

// // Tikriname ar leader variable jau nustatyas
//    if (isset($leader)) {
//    // Jeigu leaderis yra, mes tikrinam ar einamasis dalyvis
//    // nera jo aplenkes
//    if ($participant['x'] > $leader['x']) {
//    $leader = $participant;
//    }
//    } else {
//    // Jeigu leaderio dar nera, mes ji nustatom i einamaji elementa
//    $leader = $participant;
//    }
?>

<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/nav.css">
</head>
<body>
<div class="navbar">
    <a href="index.php">Home</a>
    <a href="live.php">CJ Biography</a>
    <a href="bloopers.php">Groove Street</a>
    <div class="dropdown">
        <button class="dropbtn">Dropdown
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="#">Link 1</a>
            <a href="#">Link 2</a>
            <a href="#">Link 3</a>
        </div>
    </div>
</div>
<main>
</main>
</body>
</html>
