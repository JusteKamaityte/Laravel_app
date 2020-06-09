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
    $h1 = 'Sveikas sugrįžęs ' . $user->getUsername();

    unset($nav['register']);
    unset($nav['login']);

} else {
    $h1 = 'Jūs neprisijungęs';
    unset($nav['logout']);
}

if ($_POST ) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
}
$properties=[
    'x' => 200,
    'y' => 100,
    'color'=> 'blue',
    'email'=>'mail@gmail.com',
];
$conditions=[];

$pixels = App\App::$db->getRowsWhere('pixels', $conditions);

$test= new \App\Pixels\Pixel($properties);
//var_dump($test->_getData());
//var_dump($user);
$dataholder = new \App\Pixels\Pixel($properties);


$view = new \Core\View();
$view->render('../core/templates/form.tpl.php');

\App\Pixels\Model::insert(new \App\Pixels\Pixel(['x' => 15, 'y' => 20, 'color'=> 'black']));
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
        <?php print $view->render('../app/templates/nav.tpl.php');?>
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
