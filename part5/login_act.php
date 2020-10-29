<?php
session_start();
require_once('config.php');
require_once('class.db.php');

if(empty($_POST['userName']) or empty($_POST['userPwd'])){
    echo 'Username dan Password Harus diisi <a href="login.php">Login</a>';
    exit;
}

$filter='where userName="'.$_POST['userName'].'" and userPwd="'.$_POST['userPwd'].'"';
$db		=new db($config);
$data	=$db->data($params,'user',$filter);
if(empty($data['data'][0])){
    echo 'Username dan Password Salah <a href="login.php">Login</a>';
    //exit;
}

$_SESSION['userName']=$data['data'][0]['userName'];


echo '<pre>'.print_r($data,true).'</pre>';