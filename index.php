<?php
$title = 'Coin-flip';
$x = rand(0, 2);
$class= 0;
$span= 0;

if ($x == 1) {
    $class='heads';
} else {
    $class='tails';
}

$span = $class;
?>


<html>
<head>
    <meta charset="utf-8">
    <title><?php print $title ?></title>
    <style>

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        span {
            text-transform: capitalize;
            font-size: 50px;
            font-weight: bold;
        }
        div{
            height: 500px;
            width: 500px;
            background-size:cover;
        }
        .heads{
            background-image:url("https://www.leftovercurrency.com/wp-content/uploads/2016/11/1-american-dollar-coin-reverse-1.jpg");
        }
        .tails{
            background-image: url("https://random-ize.com/coin-flip/us-quarter/us-quarter-back.jpg");
        }

    </style>

</head>

<body>
    <div class="<?php print $class ?>"></div>
        <span><?php print $span ?></span>
</body>
</html>

