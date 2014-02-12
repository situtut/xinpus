<?php

require './lib/Spiralify.php';

// Build new spiral
$spiralify = new Spiralify(((int) @$_GET['num']) ? (int) $_GET['num'] : 3);

// Get the result of the spiral we have built before
$out = $spiralify->getResult();

?>

<!DOCTYPE html>
<html>
    <head class="no-js" lang="en">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>ZeekLab&trade; :: Spiral</title>

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/foundation.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">

        <link rel="icon" href="img/favicon.png">

        <script type="text/javascript" src="js/modernizr.min.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/fastclick.min.js"></script>
        <script type="text/javascript" src="js/foundation.min.js"></script>
    </head>
    <body>
        <div style="margin-top: 50px; font-family: 'Droid Sans Mono'" class="row panel">
            <p>Ganti get parameter dengan query string 'num' untuk generate matriks dengan ukuran yang sesuai dengan keinginan kamu (default = 3).</p>
            <p>Ex: <code>http://www.example.com/quiz.php?num=6</code></p>
            <table>
                <?php foreach($out as $row): ?>
                    <tr>
                        <?php foreach($row as $item): ?>
                            <td><?php echo $item ?></td>
                        <?php endforeach ?>
                    </tr>
                <?php endforeach ?>
            </table>
            <p>Nilai matrix ke dua adalah <b><?php echo $spiralify->getResult(2)?><b></p>
            <p>Nilai matrix ke tiga adalah <b><?php echo $spiralify->getResult(3)?><b></p>
            <p>Nilai matrix ke delapan adalah <b><?php echo $spiralify->getResult(8)?><b></p>
        </div>
    </body>
</html>

