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


$conditions = [
    'rows'=>[
        'name' => 'Mantas',
        'surname' => 'Samtis',
    ],
    [
        'name' => 'Algis',
        'surname' => 'Dalgis',
    ],
    [
        'name' => 'Tomas',
        'surname' => 'Stogas',
    ]

];


$logged = is_logged_in();

if ($logged) {
    unset($nav[1]);
    unset($nav[2]);
    $data = file_to_array(USER);

    foreach ($data as $user) {
        if ($user['email'] == $_SESSION['email']) {
            $h1 = 'Sveika sugrįžusi ' . $user['username'];
        }
    }
} else {
    $h1 = 'Jūs neprisijungęs';
    unset($nav[3]);
}


$db = new FileDB(DB_FILE);

$db->setData($conditions);
$db->save($conditions);
$db->getRowbyId('conditions', 1);
var_dump($conditions);
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
       <h1><?php print $h1; ?></h1>
    </span>
</main>
</body>
</html>
