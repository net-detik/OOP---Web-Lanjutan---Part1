<?php
require_once('config.php');
require_once('class.db.php');


$params=array(
    'userName'=>"Muhammad",
    'userEmail'=>"muhammad@sti.ac.id",
    'userPwd'=>"3455"

);
$db		=new db($config);
$data	=$db->update($params,'user','where userId="2"');
echo '<pre>'.print_r($data,true).'</pre>';
