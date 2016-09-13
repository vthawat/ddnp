<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link href="<?=base_url()?>themes/bootstrap3/css/bootstrap.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?=base_url()?>themes/bootstrap3/css/font-awesome.min.css" rel="stylesheet">

  <!-- Theme style -->
  <link href="<?=base_url()?>themes/admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="login-page bg-green-gradient">
<div class="login-box well">
  <div class="login-logo">
    <a href="<?=base_url()?>"><img src="<?=base_url('images/logo.png')?>"></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  	<?php if($form_error):?>
  		<div class="alert alert-warning"><?=$form_error?></div>
  	<?php endif;?>
    <form action="" method="post">
      <div class="form-group has-feedback">
      	<label class="text-blue">Username</label>
        <input type="email" class="form-control" placeholder="Username" name="username">
      </div>
      <div class="form-group has-feedback">
      	<label class="text-blue">Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password">
      </div>
      <div class="row">
        <div class="col-xs-6">
          <div class="checkbox icheck">
            <label>
              <input name="remember" type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-sign-in"></i>Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <a href="#" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
<script src="<?=base_url()?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url()?>themes/bootstrap3/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?=base_url()?>assets/plugins/iCheck/icheck.min.js"></script>
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