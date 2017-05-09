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
         <div class="row">
            <?php if($tasks){ ?>
            <div class="timeline-centered">
               <?php $i=1;foreach($tasks as $task){ ?>
               <?php if(($i%2)==0){ ?>
               <article class="timeline-entry left-aligned">
               <?php } else { ?>
               <article class="timeline-entry">
               <?php } ?>
                  <div class="timeline-entry-inner">
                     <time class="timeline-time"><span><?php echo date('h:i A', strtotime($task->time)); ?></span> <span><?php echo date("F jS, Y", strtotime($task->date));?></span></time>
                     <div class="timeline-icon bg-secondary">
                     </div>
                     <div class="timeline-label">
                        <a href="<?php echo base_url();?>task/<?php echo $task->id;?>"><h2><?php echo $task->name;?></h2></a>
                        <p><?php echo $task->description; ?></p>
                        <p>
                           <a href="<?php echo base_url();?>task/<?php echo $task->id;?>"><button type="button" class="btn btn-info btn-small" style="margin-right:10px">View Details</button></a>
                           <a href="<?php echo base_url();?>task/edit/<?php echo $task->id;?>"><button type="button" class="btn btn-primary btn-small" style="margin-right:10px">Edit</button></a>
                           <a href="<?php echo base_url();?>task/delete/<?php echo $task->id;?>"><button type="button" class="btn btn-danger btn-small" style="margin-right:10px">Delete</button></a>
                           <span class="tag">Status : <?php echo ($task->status) ? '<strong style="color:green">Active</strong>' : '<strong style="color:red">Closed</strong>' ;?></span>
                        </p>
                     </div>
                  </div>
               </article>
               <?php $i++;} ?>
               <article class="timeline-entry begin">
                  <div class="timeline-entry-inner">
                     <div class="timeline-icon" style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);">
                     </div>
                  </div>
               </article>
            </div>
            <?php } else { ?>
            <div class="login-page">
               <div class="form">
                  <legend>No Tasks Found</legend>
                  <p><a href="<?php echo base_url().'task/add';?>"><button type="button">Create Your First Task</button></a></p>
               </div>
            </div>
            <?php } ?>
         </div>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/core.js" integrity="sha256-BSsbXsDErniq/HpuhULFor8x1CpA2sPPwQLlEoEri+0=" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   </body>
</html>