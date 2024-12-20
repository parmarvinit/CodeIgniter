<?php include('header.php') ?>

   
    <div class="container" style="margin-top:20px">
    <h1>Admin Form</h1>
    <?php echo form_open('admin/login') ?> 
    <div class="row">
            <div class="col-lg-6">
                <div class="form-group" style="margin-top:20px">
                    <label for="email">User Name:</label>
                    <!-- <input type="email" id="email" name="email" class="form-control"> -->
                    <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter User Name','name'=>'uname','value'=>set_value('uname')]); ?>
                </div>
            </div>
                <div class="col lg-6" style="margin-top:40px;"><?php echo form_error('uname'); ?></div>
    </div>
    <div class="row">
        <div class="col-lg-6" >
            <div class="form-group" style="margin-top:10px">
                <label for="pwdd">Password:</label>
                <!-- <input type="password" id="pwd" class="form-control"> -->
                <?php echo form_password(['class'=>'form-control','type'=>'password','placeholder'=>'Enter Password','name'=>'pass']); ?>
            </div></div>
            <div class="col lg-6" style="margin-top:40px;"><?php echo form_error('pass'); ?></div>
    </div>
        <!-- <button type="submit" class="btn-default" style="margin-top:10px">Submit</button> -->
        <?php echo form_submit(['type'=>'submit','class'=>'btn-default','value'=>'submit','style'=>"margin-top:10px"]); ?>
        <?php echo form_reset(['type'=>'reset','class'=>'btn-default','value'=>'Reset','style'=>"margin:10px"]); ?>
        <?php echo anchor('admin/register/',"Sign Up?",'class="link-class"'); ?>
    </div>

<?php //echo validation_errors(); ?>
<?php include('footer.php') ?>

