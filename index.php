<?php

$h1 = 'You are not logged in ';

if(isset( $_SESSION['email'])){
    $data = file_to_array(USER);
    foreach($data as $user_key){
        if($user_key['email'] == $_SESSION['email']){
            $h1 = 'Welcome back , ' .$user_key['username'];
            return true;
        }
        return false;
    }
}
?>

<html>
<head>
    <meta>
    <link rel="stylesheet" href="app/assets/css/main.css">
    <title>Home</title>
</head>
<body>
<main>
    <section class="nav_bar">
        <?php include 'core/templates/nav.tpl.php'; ?>
    </section>

    <h1> <?php print $h1; ?></h1>
</main>
</body>
</html>
