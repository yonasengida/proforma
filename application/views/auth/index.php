
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Welcome to LMT-LOGIN</title>

    <!--<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/datatables/dataTables.min.css">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url() ?>assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url() ?>assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container ">
      <div class="col-md-12"  style="margin-top:40px">
        <img class="" src="<?php echo base_url("assets/images/micro_header.jpg");?>"/>
      <!-- <h2 class="form-signin-heading">Please sign in</h2> -->
    </div>
          <div class="col-md-4"></div>
        <form action='<?php echo base_url();?>auth/process' method='post' name='process'>
        		<div class="col-md-4">

              <div class="col-md-12 ">
                  <img class="card-img-top" src="<?php echo base_url("assets/images/login.png");?>" alt="Card image cap" style="width:100px;height:100px">
              <!-- <h2 class="form-signin-heading ">Login</h2> -->
            </div>
              <div class="col-md-12 ">
              <?php if(! is_null($msg)) echo $msg;?>
            </div>
        		   <div class="col-md-12">
                <label for="inputEmail" class="sr-only">User Name</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="User Name" required autofocus></br>
              </div>
                <div class="col-md-12">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>

        	    	</div>
                <div class="col-md-12">
                  <?php// if(! is_null($err)) echo $err;?>
              </div>
                <div class="col-md-12"  style="margin-top:20px">
               <div class="col-md-3">
                <label for="inputPassword" class="sr-only"></label>
                  <input type="text" id="num1" name="num1" value="<?php echo rand(1,10)?>" class="form-control" readonly required>
                </div>
               <div class="col-md-3">
               <label for="inputPassword" class="sr-only"></label>
                 <input type="text" id="num2" name="num2" value="<?php echo '+'?>" class="form-control" readonly  required>
               </div>
              <div class="col-md-3">
               <label for="inputPassword" class="sr-only"></label>
                 <input type="text" id="num2" name="num2" value="<?php echo rand(1,10)?>" class="form-control" readonly  required>
               </div>
                 <div class="col-md-3">
                <label for="inputPassword" class="sr-only"></label>
                  <input type="text" id=answer"" name="answer" class="form-control"   required>
                </div>
                </div>
        		<div class="col-md-4" style="margin-top:10px">
                <button class="btn btn-info center-block" type="submit">Sign in</button>
        		</div>

            </div>
          </form>
   <div class="col-md-4"></div>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url() ?>assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
