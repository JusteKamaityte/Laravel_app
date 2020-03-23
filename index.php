<?php
$avys = [];

for($i = 0; $i < 5; $i++){
    if($i == 0){
        $avys[$i]= 'bleee';
    }else {
        $avys[$i] = &$avis[$i - 1];
    }
}

var_dump($avys);

 ?>

<html>
<head>
    <title>&</title>
    <style>

    </style>
</head>
<body>
</body>
</html>