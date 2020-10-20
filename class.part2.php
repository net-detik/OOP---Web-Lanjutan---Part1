<?php
class Buah {
  public $nama;
  public $warna;
  public $berat;
  public $harga;

  function __construct($nama, $warna, $berat,$harga) {
    $this->nama = $nama;
    $this->warna = $warna;
    $this->berat = $berat;
    $this->harga = $harga;
  }
  function get_name() {
    return $this->nama;
  }
  function get_color() {
    return $this->warna;
  }
  function get_berat() {
    return $this->berat;
  }
  function get_harga() {
    return $this->harga;
  }
}

$apple = new Buah("Apple", "Hijau","2Kg","20000");
echo $apple->get_name();
echo "<br>";
echo $apple->get_color();
echo "<br>";
echo $apple->get_berat();
echo "<br>";
echo $apple->get_harga();
?>
