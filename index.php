<?php
$police_reports = [
        [
                'subject' => 'Domantas',
                'reason' => 'Public urination',
                'amount' => 50
        ],
        [
            'subject' => 'Migle',
            'reason' => 'Drunk in public',
            'amount' => 0
        ],
        [
            'subject' => 'Juste',
            'reason' => 'Skinny dipping',
            'amount' => 0
        ],
        [
            'subject' => 'Saulius',
            'reason' => 'Constant complaining',
            'amount' => 200
        ]
];

foreach($police_reports as $index => $report) {
    if ($report['amount'] === 0) {
        $report['warning'] = true;
    } else {
        $report['warning'] = false;
    }
    $report['text'] = $report['subject'] . '(' . $report['reason'] .')';
    if($report['warning']){
        $report['text'] .= 'Ispejimas';
    }else{
        $report['text'] .= 'Bauda' .$report['amount'];
    }
    $police_reports[$index] = $report;
    }
    var_dump($police_reports);
    $h1 = 'Palicijos israsas';
?>


<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css">
    <title><?php print $title ;?></title>
</head>
<body>
    <h1><?php print $h1 ; ?></h1>
        <ul>
            <?php foreach ($police_reports as $index => $report): ?>
            <li>
                <?php print $report['text']; ?>
            </li>
            <?php endforeach ; ?>
        </ul>
</body>
</html>
