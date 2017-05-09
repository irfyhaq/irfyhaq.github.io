<!DOCTYPE html>
<html lang="en">
   <head>
      <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   </head>
   <body>
      <header>
         <div class="cp-nav-logo-bar">
            <div class="container">
               <div class="row">
                  <div class="col-md-5 col-sm-5">
                     <a href="<?php echo base_url();?>"><button type="button" class="btn btn-default btn-small" style="margin-right:10px"><i class="fa fa-home" aria-hidden="true"></i>Home</button></a>
                     <span>Welcome, <strong><?php echo $this->session->userdata('username');?></strong><span>
                  </div>
                  <div class="col-md-3 col-sm-3">
                     <a href="<?php echo base_url();?>task/add"><button type="button" class="btn btn-success btn-round-lg btn-lg"><i class="fa fa-plus" aria-hidden="true"></i>ADD NEW TASK</button></a>
                  </div>
                  <div class="col-md-4 col-sm-4">
                     <a href="<?php echo base_url();?>user/logout"><button type="button" class="btn btn-primary btn-small right">Logout</button></a>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <div class="container">
         <div class="login-page">
            <div class="form">
               <legend>Notification</legend>
               <?php if(isset($message)){ ?>
               <div class="alert alert-success alert-dismissable fade in">
                  <strong><?php echo $message;?></strong>
               </div>
               <?php if(isset($redirect)){ ?>
                  <p><a href="<?php echo base_url().'task/'.$id;?>"><button type="button">View Task</button></a></p>
                  <?php } ?>
               <?php } ?>
            </div>
         </div>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/core.js" integrity="sha256-BSsbXsDErniq/HpuhULFor8x1CpA2sPPwQLlEoEri+0=" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   </body>
</html>