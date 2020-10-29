<html>
<head>
    <title> Login </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div row="row">
        <div class="col-md-6">
            <h1>Silahkan Login</h1>
            <div class="alertLogin"></div>
            <form method="POST" action="javascript:login()">
            <div class="form-group">
                <label for="userName">Username</label>
                <input type="text" class="form-control" id="userName" name="userName" aria-describedby="emailHelp">
                
            </div>
            <div class="form-group">
                <label for="userPwd">Password</label>
                <input type="password" class="form-control" id="userPwd" name="userPwd">
            </div>
            
            <button type="submit" class="btn btn-primary btnLogin">Login</button>
            </form>
        </div>    
        </div><!--/row--->
    </div>

    <script type="text/javascript" src="https://www.dipanggilaja.com/assets/js/page.min.js"></script>
    <script>
        var login = function(){ 
            $('.btnLogin').attr('disabled','disabled');
            $('.btnLogin').html('Loading...');

            var fData=$('form').serializeArray(); 
            
            var params={};
            $.each(fData,function(key,val){
                params[val.name]=val.value;
            });    
            console.log(params);

            $.ajax({url: "login_act.php",
            method:'POST',
            dataType:'json',
            data:params, 
                success: function(result){
                    console.log(result);
                    if(result.respon.pesan=='gagal'){
                        //alert(result.respon.text_msg);
                        $('.alertLogin').html('<div class="alert alert-danger">'+result.respon.text_msg+'</div>');
                        $('.btnLogin').removeAttr('disabled');
                        $('.btnLogin').html('Login');
                        $('.alertLogin').fadeOut("slow");
                    }else{
                        window.location='tampil_data.php';
                    }
                }
            });
        }

    </script>

</body>
</html>