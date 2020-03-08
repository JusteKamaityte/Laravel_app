<!doctype html>
<html>
<head>
    <title>PHP and HTML</title>
</head>
<body>
    <h1>Embed PHP in HTML</h1>

    <!--    Sample 1-->
    <?php echo 'Hello World' ?>
    <p>This is going to be ignored by PHP and displayed by the browser.</p>
    <?php echo 'While this is going to be parsed.'; ?>
    <p>This will also be ignored by PHP and displayed by the browser.</p>
</body>
</html>
