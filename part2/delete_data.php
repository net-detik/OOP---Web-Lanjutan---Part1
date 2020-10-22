<?php
require_once('config.php');
require_once('class.db.php');


$db		=new db($config);
$data	=$db->delete('barang','where barangId="1"');
echo '<pre>'.print_r($data,true).'</pre>';
