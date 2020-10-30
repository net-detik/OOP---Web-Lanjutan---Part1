<?php
require_once('config.php');
require_once('class.db.php');


$db		=new db($config);
$data	=$db->delete('barang','where barangId="'.$_GET['id'].'"');
echo '<pre>'.print_r($data,true).'</pre>';
echo"<a href='tampil_data.php'>Kembali</a>";
