<?php
require 'bootloader.php';


$nav = [
    [
    'link' => '/index.php',
    'name' => 'Home'
    ],
    [
        'link' => '/register.php',
        'name' => 'Register'
    ],
    [
        'link' => '/login.php',
        'name' => 'Login'
    ],
    [
        'link' => '/logout.php',
        'name' => 'Logout'
    ]
];


$array=[
'oop' =>'!poo'
];

$logged = is_logged_in();

if($logged){
    unset($nav[1]);
    unset($nav[2]);
    $data = file_to_array(USER);

    foreach($data as $user){
        if($user['email'] == $_SESSION['email']){
            $h1 = 'Sveika sugrįžusi ' .$user['username'];
        }
    }
}else{
    $h1 = 'Jūs neprisijungęs';
    unset($nav[3]);
}



$db = new FileDB(DB_FILE);


$db->setData($array);
$db->save($array);

var_dump($db);

?>

<html>
<head>
    <meta>
    <link rel="stylesheet" href="media/css/main.css">
    <title>Home</title>
</head>
<body>
<main>

    <section class="nav_bar">
        <?php include '../app/templates/nav.tpl.php'; ?>
    </section>
    <h1>Home</h1>
    <span>
       <h1><?php print $h1 ;?></h1>
    </span>
</main>
</body>
</html>
