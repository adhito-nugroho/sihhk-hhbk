<?php
  error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
  include "include/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CDK Wilayah Nganjuk | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
   <b>CDK</b>Wilayah Nganjuk
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Halaman Login</p>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="pass" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>

<?php
    if (isset($_POST['login'])){
        $username = $_POST['username'];
        $pass = $_POST['pass'];

        $sql = $koneksi->query("select * from tb_admin where nama_admin='$username' and password='$pass'");
        $data = $sql->fetch_assoc();
        $ketemu = $sql->num_rows;
        
        if ($ketemu == 1){
            session_start();
            switch ($data['level']) {
              case "admin":
                $_SESSION['admin'] = $data['nama_admin'];
                $_SESSION['level'] = $data['level'];
                $_SESSION['foto'] = $data['foto'];
                break;
              case "penyuluh":
                $_SESSION['penyuluh'] = $data['nama_admin'];   
                $_SESSION['level'] = $data['level'];
                $_SESSION['foto'] = $data['foto']; 
                break;
              case "operator":
                $_SESSION['operator'] = $data['nama_admin'];
                $_SESSION['level'] = $data['level'];
                $_SESSION['foto'] = $data['foto'];
                $_SESSION['kode_admin'] = $data['kode_admin'];

                break;
            }
            header("location:index.php");
        }
        else
        {
          ?>
          
            <script type="text/javascript">
              alert("Login Gagal, Username dan Password Salah.. Silahkan Ulangi Kembali!!");
            </script>
            
          <?php
        }
    }
?>
