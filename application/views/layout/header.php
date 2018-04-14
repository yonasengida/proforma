<html>
<head>
  <title>Proforma</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<!--   <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/datatables/dataTables.min.css">
 -->
  <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery/jquery-3.2.1.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('static/css/bootstrap-datetimepicker.css');?>">
    <!-- <link href="" rel="stylesheet" /> -->
 <!-- <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.css" rel="stylesheet"/> -->
  <link rel="stylesheet" href="<?php echo base_url('assets/datatables/css/dataTables.min.css');?>">

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
            <a class="navbar-brand" href="#">Proforma Managment System</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class=""><a href="<?php echo base_url().'home'?>"><i class="glyphicon glyphicon-home"></i></a></li>
              <!---------------------------------------------------------------------------------------------------------------->

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Proforma<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url().'proforma'?>">New Proforma</a></li>
                   <li role="separator" class="divider"></li>

                   <li><a href="<?php echo base_url().'proforma/search_by_ref'?>">Search By Reference</a></li>
                    <li role="separator" class="divider"></li>
                  <li><a href="<?php echo base_url().'proforma/getSummaryByCustomer'?>">View Proforma</a></li>
                  <li role="separator" class="divider"></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Customer<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url().'customer'?>">New</a></li>
                   <li role="separator" class="divider"></li>
                  <li><a href="<?php echo base_url().'customer'?>">View Customer </a></li>
                  <li role="separator" class="divider"></li>

                </ul>
              </li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Setting<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url().'item'?>">Create Item</a></li>
                  <li><a href="<?php echo base_url().'category'?>">Create Category</a></li>
                  <li><a href="<?php echo base_url().'brand'?>">Create Brand</a></li>
                  <li><a href="<?php echo base_url().'user'?>">Create User</a></li>
                  <li><a href="<?php echo base_url().'group'?>">Create Group</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="">Loged In As {<?php  echo $this->session->userdata('user_name');?>} From Branch:<?php  echo $this->session->userdata('branch');?></a></li>
              <li><a href="<?php echo base_url().'auth/logout'?>">Logout</a></li>
            </ul>
          </div>
        </div>
      </nav>
       <div class="container">
