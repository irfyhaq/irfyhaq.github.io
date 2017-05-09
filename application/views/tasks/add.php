<!DOCTYPE html>
<html lang="en">
   <head>
      <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   </head>
   <body>
      <div class="container">
         <div class="task-page">
            <div class="task">
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
               <form method="post" accept-charset="utf-8" action="<?php echo base_url();?>task/add" class="form-horizontal">
                  <fieldset>
                     <!-- Form Name -->
                     <legend>Add Task</legend>
                     <!-- Text input-->
                     <div class="form-group">
                        <label class="col-md-4 control-label" for="name">Task Name</label>  
                        <div class="col-md-5">
                           <input id="textinput" name="name" type="text" placeholder="Eg : Meeting at 5" value="<?php echo set_value('name'); ?>" class="form-control input-md" required="required">
                        </div>
                     </div>
                     <!-- Appended Input-->
                     <div class="form-group">
                        <label class="col-md-4 control-label" for="date">Start Date</label>
                        <div class="col-md-4">
                           <div class="input-group">
                              <input id="startdate" name="date" class="form-control" placeholder="08/32/2016" type="date" required="required">
                              <span class="input-group-addon"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></span>
                           </div>
                        </div>
                     </div>
                     <!-- Appended Input-->
                     <div class="form-group">
                        <label class="col-md-4 control-label" for="time">Start Time</label>
                        <div class="col-md-4">
                           <div class="input-group">
                              <input id="startdate" name="time" class="form-control" placeholder="" type="time" required="required">
                              <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                           </div>
                        </div>
                     </div>
                     <!-- Select Basic -->
                     <div class="form-group">
                        <label class="col-md-4 control-label" for="priority">Priority</label>
                        <div class="col-md-4">
                           <select id="priority" name="priority" class="form-control">
                              <option value="6">Immediate</option>
                              <option value="5">High</option>
                              <option value="4">Low</option>
                              <option value="3">Very Low</option>
                              <option value="2">Negligible</option>
                              <option value="1">To Do</option>
                           </select>
                        </div>
                     </div>

                     <!-- Textarea -->
                     <div class="form-group">
                        <label class="col-md-4 control-label" for="description">Task Description</label>
                        <div class="col-md-4">                     
                           <textarea class="form-control" id="desription" rows="5" name="description">Urgent meeting. Discuss to migrate DB with the dev team</textarea>
                        </div>
                     </div>

                     <!-- Submit -->
                     <div class="form-group">
                        <div class="col-md-12">
                           <button type="submit">CREATE</button>
                        </div>
                     </div>
                  </fieldset>
               </form>
            </div>
         </div>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/core.js" integrity="sha256-BSsbXsDErniq/HpuhULFor8x1CpA2sPPwQLlEoEri+0=" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   </body>
</html>