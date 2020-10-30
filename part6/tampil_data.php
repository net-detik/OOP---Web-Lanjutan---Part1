<?php
session_start();

if(empty($_SESSION['userName'])){
    echo 'Anda Tidak berhak akses halaman ini';
    exit();
}

// require_once('config.php');
// require_once('class.db.php');
// $db		=new db($config);
// $data	=$db->data($params,'barang',$filter);
// //echo '<pre>'.print_r($data,true).'</pre>';
?>
<html>
<head>
    <title>Tampil Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</head>
<body>

    <?php require_once('header.php'); ?>
    <h1>Data Barang</h1>

    <a href="simpan_data.php">Tambah</a>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Aksi</th>
        <th scope="col">ID</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Harga Barang</th>
        </tr>
    </thead>
    <tbody class="tampilData"></tbody>
    </table>

    <script type="text/javascript" src="https://www.dipanggilaja.com/assets/js/page.min.js"></script>
    <script>
        var tampilData = function(){ 
            var params={};
            $.ajax({url: "ajax.php?mod=tampil_data",
            method:'POST',
            dataType:'json',
            data:params, 
                success: function(data){
                    console.log(data);
                    if(data.respon.pesan=='gagal'){

                    }else{
                        var dataView='';                        
                        $.each(data.result.items,function(key,val){
                            dataView=dataView+'<tr><td><a href="">Hapus</a> <a href="">Edit</a><td>'+val.barangId+'</td><td>'+val.barangName+'</td><td>'+val.barangHarga+'</td></tr>';
                        });
                        console.log(dataView);
                        $('.tampilData').html(dataView);
                    }
                }
            });
        }

        $(function(){
            tampilData();
        });

    </script>

</body>
</html>





