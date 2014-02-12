<?php

/**
* Class Spiralify
*
* Dibuat untuk menjalin hubungan bilateral... LOH!!! Dibuat untuk menyelesaikan tugas
* kampus XINIX. Membuat pattern spiral matriks dengan angka.
*
* @author Krisan Alfa Timur
*/
class Spiralify {

    /*
    * Array yang berisi nilai-nilai spiral pattern
    */
    protected $array = array();

    /*
    * Array yang berisi nilai-nilai spiral flattened
    */
    protected $flattened = array();

    /**
    * Konstruktor, memanggil function _doProcess untuk mengisi nilai ke dalam array
    *
    * @param   (int)   $num   panjang baris atau kolom yang ingin diproses
    * @return  (void)
    */
    public function __construct($number) {
        // args explanation
        // [0] => (int) $number/2       koordinat x harus berada di tengah matriks
        // [1] => (int) $number/2       koordinat y harus berada di tengah matriks
        // [2] => 'R'                   awal arah matriks diisi ke arah kanan
        // [3] => 1                     nilai awal yang diisi ke dalam matriks adalah 1 (satu)
        // [4] => 1                     jumlah langkah harus satu (mengikuti soal)
        // [5] => $number * $number     n dalam matriks, mengikuti rumus bujur sangkar (nilai * nilai)
        $this->_doProcess((int) $number/2, (int) $number/2, 'RIGHT', 1, 1, 1, $number * $number);
    }

    /**
    * Fungsi untuk mengisi deretan nilai ke dalam array
    *
    * @param   (int)      $x                Koordinat x di dalam matrix
    * @param   (int)      $y                Koordinat x di dalam matrix
    * @param   (string)   $direction        Arah bergerak nilai di dalam matrix possible value:
    *                                       ['UP'|'RIGHT'|'DOWN'|'LEFT']
    * @param   (int)      $stepSizeLeft     Jumlah langkah yang tersisa
    * @param   (int)      $currentValue     Nilai yang sedang diproses
    * @param   (int)      $stepSize         Panjang langkah
    * @param   (int)      $size             Nilai maksimal yang akan diproses
    * @return  (void)
    */
    protected function _doProcess($x, $y, $direction, $stepSizeLeft, $currentValue, $stepSize, $size) {
        // simpan currentValue ke dalam properti $array
        $this->array[$y][$x] = $currentValue;

        // kurangi stepSizeLeft, agar ketika variable ini == 0, arah akan berubah
        $stepSizeLeft--;

        // kalau currentValue udah berada di akhir, selesaikan prosedur kemudian, urutkan array berdasarkan key-nya
        // kemudian buat flattened array agar nilai bisa diakses secara array 1 dimensi
        if($currentValue == $size) {
            // konstruksi sorted array
            // http://www.php.net/manual/en/function.ksort.php
            $sorted = array();
            // sort parent
            ksort($this->array);
            foreach ($this->array as $key => $row) {
                // sort child
                ksort($row);
                // set value
                $array[$key] = $row;
            }
            $this->array = $array;

            // konstruksi flattened array
            // http://www.php.net/manual/en/class.recursivearrayiterator.php
            $flatten = array();
            $itterator = new RecursiveIteratorIterator(new RecursiveArrayIterator($array));
            foreach($itterator as $value) {
                array_push($flatten, $value);
            }
            $this->flattened = $flatten;

            // akhiri prosedur untuk mencegah infinite loop
            return;
        }

        // | x |  x   x   x  | Direction guide:
        // |---|-------------| (e) ==> Naik  = y - 1 ('UP')
        // | y | (a) (b) (c) | (e) ==> Kanan = x + 1 ('RIGHT')
        // | y | (d) (e) (f) | (e) ==> Turun = x + 1 ('DOWN')
        // | y | (g) (h) (i) | (e) ==> Kiri  = y + 1 ('LEFT')
        switch ($direction) {
            case 'UP':
                $y--;
                break;
            case 'RIGHT':
                $x++;
                break;
            case 'DOWN':
                $y++;
                break;
            case 'LEFT':
                $x--;
                break;
        }

        // kalau stepSizeLeft udah 0, kita ubah arahnya
        if($stepSizeLeft == 0) {

            // kalau udah setengah putaran, kita naikkan stepSize agar tidak menumpuk
            if($direction == 'DOWN' || $direction == 'UP') $stepSize++;

            // ubah arah sesuai arah putaran jarum jam
            switch ($direction) {
                case 'UP':
                    $direction = 'RIGHT';
                    break;
                case 'RIGHT':
                    $direction = 'DOWN';
                    break;
                case 'DOWN':
                    $direction = 'LEFT';
                    break;
                case 'LEFT':
                    $direction = 'UP';
                    break;
            }

            // stepSizeLeft harus di update sama dengan stepSize, agar putaran bisa dimulai lagi
            // dengan size yang lebih besar
            $stepSizeLeft = $stepSize;
        }

        // naikkan currentValue agar urutan angka terus bergerak
        $currentValue++;

        // request nilai berikutnya
        $this->_doProcess($x, $y, $direction, $stepSizeLeft, $currentValue, $stepSize, $size);
    }

    /**
    * Kembalikan sebuah kumpulan angka matriks dalam array, jika argumen diberikan, maka nilai return adalah
    * nilai dari flatten array dimana index flattened array akan selalu dimulai dari 1.
    *
    * @param   (int)   index flattened array dikurangi satu
    * @return  (mixed) array|int
    */
    public function getResult($flattenedIndex = null) {
        if(! is_null($flattenedIndex)) return isset($this->flattened[$flattenedIndex - 1]) ? $this->flattened[$flattenedIndex - 1] : null;
        return $this->array;
    }

}

