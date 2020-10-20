<?php
class Buah {
  // Properties
  public $nama;
  public $warna;

  // Methods
  function set_name($nama) {
    $this->nama = $nama;
  }
  function get_name() {
    return $this->nama;
  }
}

$salak = new Buah();
$jeruk = new Buah();
$salak->set_name('Salak');
$jeruk->set_name('Jeruk');

echo $jeruk->get_name();
echo "<br>";
echo $salak->get_name();
?>
