<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
    <title>Hoejabi Hijab Shop - Admin</title>
    <link href="pages/assets/favicon.png" rel="icon">
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- MetisMenu CSS -->
<link href="../css/metisMenu.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../css/startmin.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
    <body>
    <?=
    form_open('admin/proses_login');
    ?>
    <section class="login-block">
    <div class="container">        
            <div class="row justify-content-center mt-5">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header bg-transparent mb-0">
                <h5 class="text-center">
                <img class="mb-4-center" src="pages/assets/favicon.png" alt="" width="72" height="72">
                Please <span class="font-weight-bold text-primary">Sign In</span></h5></div>
                <div class="card-body">
                            <form role="form">
                            <form action="">
                <div class="form-group">
                <input class="form-control" placeholder="Username" name="username" type="username" autofocus>
                </div>
                <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                </div>
                <div class="form-group custom-control custom-checkbox">
                  <input name="remember" type="checkbox" value="Remember Me" class="custom-control-input" id="customControlAutosizing">
                  <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                </div>
                <div class="form-group">
                  <input type="submit" name="" value="Login" class="btn btn-light btn-block">
                </div>
              </form>
                            </div>
          </div>
        </div>
      </div>
    </div>
    </section>
    <?=
    form_close();
    ?>
        

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>
