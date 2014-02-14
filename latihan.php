<?php

$tanggalLahir = array(
    'gals' => array(
        'Tutut'      => 'Bulan/Tanggal/Tahun',
        'Someone'    => 'Bulan/Tanggal/Tahun',
        'BeautyGirl' => 'Bulan/Tanggal/Tahun',
    ),
    'guys' => array(
        'Alfa'  => 'Bulan/Tanggal/Tahun',
        'Adoel' => 'Bulan/Tanggal/Tahun',
        'Wayau' => 'Bulan/Tanggal/Tahun',
    )
);

// Isi sebanyak-banyaknya tanggal lahir temen lu di dalam array $tanggalLahir
// Abis itu, cari selisih Tahun-Bulan-Tanggal dari tiap-tiap orang dari
// kemungkinan yang ada

// Misal
// Selisih: Tutut dan Someone
// Selisih: Tutut dan BeautyGirl
// Selisih: Tutut dan Alfa
// Selisih: Tutut dan Adoel
// Selisih: Tutut dan Wayau

// Selisih: Someone dan Tutut
// Selisih: Someone dan BeautyGirl
// Selisih: Someone dan Alfa
// Selisih: Someone dan Adoel
// Selisih: Someone dan Wayau

// ... dan seterusnya

// Kata kunci: foreach, DateTime, date_diff
