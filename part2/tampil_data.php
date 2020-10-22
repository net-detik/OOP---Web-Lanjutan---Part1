<?php
require_once('config.php');
require_once('class.db.php');


$db		=new db($config);
$data	=$db->data($params,'barang',$filter);
echo '<pre>'.print_r($data,true).'</pre>';
