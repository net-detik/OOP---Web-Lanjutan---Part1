<?php
require_once('config.php');
require_once('class.db.php');

$act="simpan";

if($_GET['act']=='simpan'){
    $params=array(
        'barangName'=>$_POST['barangName'],
        'barangHarga'=>$_POST['barangHarga'],
    );

    $db		=new db($config);
    $save	=$db->save($params,'barang');
    echo '<pre>'.print_r($params,true).'</pre>';
}

if($_GET['act']=='update'){
    $params=array(
        'barangName'=>$_POST['barangName'],
        'barangHarga'=>$_POST['barangHarga'],
    );

    $db		=new db($config);
    $data	=$db->update($params,'barang','where barangId="'.$_GET['id'].'"');
    echo '<pre>'.print_r($params,true).'</pre>';
}

if(!empty($_GET['id'])){
    $act="update&id=".$_GET['id'];
    //pagildata berdasar ID
    $filter=' where barangId="'.$_GET['id'].'"';
    $db		=new db($config);
    $edit	=$db->data($params,'barang',$filter);
    //echo '<pre>'.print_r($data,true).'</pre>';
}


?>

<html>
<head>
    <title>Simpan Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</head>
<body>
<a href="tampil_data.php">Tampil Data</a>
<form method="POST" action="simpan_data.php?act=<?php echo $act; ?>">
  <div class="form-group">
    <label for="barangName">Nama Barang</label>
    <input type="text" class="form-control" id="barangName" name="barangName" aria-describedby="emailHelp" value="<?php echo $edit['data'][0]['barangName'];  ?>">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="barangHarga">Harga</label>
    <input type="text" class="form-control" id="barangHarga" name="barangHarga" value="<?php echo $edit['data'][0]['barangHarga'];  ?>">
  </div>
  
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>

</body>
</html>
