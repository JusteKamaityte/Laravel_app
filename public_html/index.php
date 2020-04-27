<?php
require '../bootloader.php';


$nav = [
    'home' =>
        [
            'link' => '/index.php',
            'name' => 'Home'
        ],
    'register' =>
        [
            'link' => '/register.php',
            'name' => 'Register'
        ],
    'login' =>
        [
            'link' => '/login.php',
            'name' => 'Login'
        ],
    'logout' =>
        [
            'link' => '/logout.php',
            'name' => 'Logout'
        ]
];


$user = App\App::$session->getUser();

if ($user) {
    $h1 = 'Sveika sugrįžusi ' . $user['username'];

    unset($nav['register']);
    unset($nav['login']);

} else {
    $h1 = 'Jūs neprisijungęs';
    unset($nav['logout']);
}


//isitraukt pixelius

$pixels = App\App::$db->getRowsWhere('pixels');

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
    <div class="pixel-container">
        <?php foreach ($pixels as $pixel): ?>
            <span style="
                    top: <?php print $pixel['x']; ?>px;
                    left: <?php print $pixel['y']; ?>px;
                    background: <?php print $pixel['color']; ?>"></span>
        <?php endforeach; ?>
    </div>
</main>
</body>
</html>
