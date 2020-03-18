<?php


function generate_matrix($size)
{
    return [

        array[$size x $size]:
        row_count(

            $size = [1, 0, 0],
            $size = [1, 0, 0],
            $size = [1, 0, 0]
        ),
        column_count(
            $size = [1, 0, 0],
            $size = [1, 0, 0],
            $size = [1, 0, 0]
        )
    ];
}


?>


<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css">
    <title>Cars</title>
</head>
<body>
<p><?php print $array ?></p>

</body>
</html>
