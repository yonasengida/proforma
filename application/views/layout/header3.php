<html>
<head>
  <title>LMT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.css" rel="stylesheet"/>
  <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

</head>
<body>


      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">LMT System</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class=""><a href="<?php echo base_url().'home'?>"><i class="glyphicon glyphicon-home"></i></a></li>
             <!-- <li><a href="#">About</a></li>
              <li><a href="#">Contact</a></li>-->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Transfer<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url().'transfer/newtransfer'?>">New</a></li>
                   <li role="separator" class="divider"></li>
                  <li><a href="<?php echo base_url().'transfer/get'?>">View Trasnfer</a></li>
                  <li role="separator" class="divider"></li>

                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Payment<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url().'payment/get'?>">Pay</a></li>

                   <li role="separator" class="divider"></li>
                  <li><a href="<?php echo base_url().'payment/getPaidPayment'?>">View Paid </a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="<?php echo base_url().'payment/get'?>"> View UnPaid</a></li>
                  <li role="separator" class="divider"></li>

                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Report<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url().'payment/search_by_date'?>">Payment Report</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="<?php echo base_url().'transfer/search_by_date'?>">Money Transfer Report</a></li>
                  <li role="separator" class="divider"></li>

                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Setting<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url().'Rate_setting/getrate'?>">Set Rate</a></li>
                  <li><a href="<?php echo base_url().'user'?>">Create User</a></li>
                  <li><a href="<?php echo base_url().'payment/get'?>">Create Branch</a></li>
                   <!-- <li role="separator" class="divider"></li>
                  <li><a href="#">Upadte Transfer</a></li>
                   <li role="separator" class="divider"></li>
                  <li><a href="<?php echo base_url().'transfer/get'?>">View Trasnfer</a></li>
                  <li role="separator" class="divider"></li> -->

                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="">Loged In As {<?php  echo $this->session->userdata('user_name');?>} From Branch:<?php  echo $this->session->userdata('branch');?></a></li>
              <li><a href="<?php echo base_url().'auth/logout'?>">Logout</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
       <div class="container">
