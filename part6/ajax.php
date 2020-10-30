<?php
session_start();
require_once('config.php');
require_once('class.db.php');

$mod=$_GET['mod'];

switch($mod){
    case 'login':
        if(empty($_POST['userName']) or empty($_POST['userPwd'])){
            $callback['respon']['pesan']='gagal';
            $callback['respon']['text_msg']='Username dan Password Harus diisi <a href="login.php">Login</a>';
            $callback['respon']['params']=$_POST;
            echo json_encode($callback);
            exit;
        }
        
        $filter='where userName="'.$_POST['userName'].'" and userPwd="'.$_POST['userPwd'].'"';
        $db		=new db($config);
        $data	=$db->data($params,'user',$filter);
        if(empty($data['data'][0])){
           // echo 'Username dan Password Salah <a href="login.php">Login</a>';
            $callback['respon']['pesan']='gagal';
            $callback['respon']['text_msg']='Username dan Password Salah <a href="login.php">Login</a>';
            echo json_encode($callback);
            exit;
        }
        
        $_SESSION['userName']=$data['data'][0]['userName'];
        
        
        $callback['respon']['pesan']='sukses';
        $callback['respon']['text_msg']='OK';
        echo json_encode($callback);

    break;
    case 'tampil_data':
    
        $db		=new db($config);
        $data	=$db->data($params,'barang',$filter);
        $callback['respon']['pesan']='sukses';
        $callback['respon']['text_msg']='OK';
        $callback['result']['items']=$data['data'];
        echo json_encode($callback);

    break;  
    
    case 'hapus_data':

    break;    

    case 'simpan_data':

    break;

}