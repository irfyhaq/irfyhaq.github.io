<!DOCTYPE html>
<html lang="en">
   <head>
      <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   </head>
   <body>
      <div class="container">
         <div class="login-page">
            <div class="form">
               <?php if(validation_errors()){ ?>
               <div class="alert alert-danger alert-dismissable fade in">
                  <strong><?php echo validation_errors();?></strong>
               </div>
               <?php } ?>
               <?php if(isset($message_errors)){ ?>
               <div class="alert alert-danger alert-dismissable fade in">
                  <strong><?php echo $message;?></strong>
               </div>
               <?php } ?>
               <form method="post" accept-charset="utf-8" action="<?php echo base_url();?>user/register" class="login-form">
                  <input type="text" name="username" placeholder="username"/>
                  <input type="password" name="pass" placeholder="password"/>
                  <input type="password" name="password2" placeholder="confirm password"/>
                  <button type="submit">Register</button>
                  <p class="message">Already Registered ? <a href="<?php echo base_url()?>user/login">Log In</a></p>
               </form>
            </div>
         </div>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/core.js" integrity="sha256-BSsbXsDErniq/HpuhULFor8x1CpA2sPPwQLlEoEri+0=" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   </body>
</html>