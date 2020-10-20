<?php
class ProsesData {
    public $dataArr;

    function __construct($dataArr){
        $this->dataArr=$dataArr;
    }

    function get_data(){
        return $this->dataArr;
    }
}

// $dataArr=array(
//     'nama'=>"Apple",
//     "warna"=>"Hijau",
//     "berat"=>"2Kg",
//     "asal"=>"Indonesia",
//     "harga"=>20000
// );

$dataArr=array(
    'nama'=>"Yamaha",
    "warna"=>"Hijau",
    "berat"=>"100Kg",
    "asal"=>"Indonesia",
    "harga"=>320000000,
    "Mesin"=>"150cc",
    "Kecepatan"=>"250Km/jam"
);

$pd=new ProsesData($dataArr);
$data=$pd->get_data();
echo "<pre>".print_r($data,true).'</pre>';
