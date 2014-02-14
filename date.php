<?php

$ulangTahunAdoel = new DateTime('10/5/1988');
$ulangTahunAlfa = new DateTime('7/16/1991');

$formatted = date_format($ulangTahunAdoel, 'D, d-M-Y');

$date = new DateTime();

$diff = date_diff($ulangTahunAdoel, $date);

$countDays = $diff->days;
$target = date("D", strtotime("-".$countDays." days"));
var_dump($countDays . ' ke belakang adalah hari: ' . $target);

var_dump('90 hari ke depan adalah hari: ' . date("D", strtotime("+90 days")));

$selisih = $diff->days - 799;
$t = date("D, d-M-Y", strtotime("-".$selisih." days"));
var_dump('799 hari setelah Adoel lahir adalah ' . $t);

$gueDanAdoel = date_diff($ulangTahunAdoel, $ulangTahunAlfa);

var_dump('Alfa dan Adoel terpaut ' . $gueDanAdoel->y . ' tahun');

