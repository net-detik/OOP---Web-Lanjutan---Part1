<?php
require_once('config.php');
require_once('class.db.php');


$params=array(
    'barangName'=>"Roti Tawar",
    'barangHarga'=>20000,
);

$db		=new db($config);
$save	=$db->save($params,'barang');
echo '<pre>'.print_r($save,true).'</pre>';
