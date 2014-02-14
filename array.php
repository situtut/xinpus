<?php

// $bilangan = array();

// $bilangan['genap'] = array();
// $bilangan['ganjil'] = array();

// for($i = 0; $i <= 13; $i++) {

//     if ($i == 0) continue;

//     if($i % 2 == 0){
//         array_push($bilangan['genap'], $i);
//     } else {
//         array_push($bilangan['ganjil'], $i);
//     }

// }

// var_dump($bilangan);

// $ganjil = count($bilangan['ganjil']);
// var_dump('Jumlah yang ada di bilangan ganjil = ' . $ganjil);

// $genap = count($bilangan['genap']);
// var_dump('Jumlah yang ada di bilangan genap = ' . $genap);

$earth = array(
        'people' => array('Adoel', 'Wayau', 'Tutut', 'Wahyu', 'Pendi'),
        'animals' => array('Gajah', 'Semut', 'Nying-nying')
    );
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Array</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ZeekLab&trade;</title>

    <!-- CSS Files -->
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/foundation.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <link rel="icon" href="img/favicon.png">

    <!-- JavaScript Files -->
    <script type="text/javascript" src="js/modernizr.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/fastclick.min.js"></script>
    <script type="text/javascript" src="js/foundation.min.js"></script>
</head>
<body>
    <div class="row">
        <select name="people" id="">
            <option value="">Pilih Nama</option>
            <?php array_push($earth['people'], 'Pak Nurdin') ?>
            <?php array_push($earth['animals'], 'Jerapah') ?>
            <?php foreach ($earth['people'] as $name) {
                if ($name == 'Wayau') {
                    echo '<option selected>'.$name.'</option>';
                } else {
                    echo '<option>'.$name.'</option>';
                }
            } ?>
        </select>
        <select name="animals" id="">
            <option value="">Pilih Binatang Piaraan</option>
            <?php foreach ($earth['animals'] as $animal) {
                echo '<option>'.$animal.'</option>';
            } ?>
        </select>
    </div>
</body>
</html>

