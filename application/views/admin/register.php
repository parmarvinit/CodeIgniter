<?php include('header.php') ?>

<div class="container mb-5 "  style="margin-top:20px">
    <h1>Registration Form</h1>
    <?php echo form_open('admin/sendmail'); ?> 

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group" style="margin-top:20px">
                <label for="fname">First Name:</label>
                <?php echo form_input(['class'=>'form-control', 'placeholder'=>'Enter First Name', 'name'=>'fname', 'value'=>set_value('fname')]); ?>
            </div>
            <div class="mx-2"><span><?php echo form_error('fname'); ?></span></div>
            
        </div>
        
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group" style="margin-top:20px">
                <label for="lname">Last Name:</label>
                <?php echo form_input(['class'=>'form-control', 'placeholder'=>'Enter Last Name', 'name'=>'lname', 'value'=>set_value('lname')]); ?>
            </div>
            <div class="mx-2"><span><?php echo form_error('lname'); ?></span></div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group" style="margin-top:20px">
                <label for="uname">User Name:</label>
                <?php echo form_input(['class'=>'form-control', 'placeholder'=>'Enter User Name', 'name'=>'uname', 'value'=>set_value('uname')]); ?>
            </div>
            <div class="mx-2"><span><?php echo form_error('uname'); ?></span></div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group" style="margin-top:20px">
                <label for="pass">Password:</label>
                <?php echo form_password(['class'=>'form-control', 'placeholder'=>'Enter Password', 'name'=>'pass']); ?>
            </div>
            <div class="mx-2"><span><?php echo form_error('pass'); ?></span></div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group" style="margin-top:20px">
                <label for="email">Email:</label>
                <?php echo form_input(['class'=>'form-control', 'type'=>'email', 'placeholder'=>'Enter Email ID', 'name'=>'email', 'value'=>set_value('email')]); ?>
            </div>
            <div class="mx-2"><span><?php echo form_error('email'); ?></span></div>
        </div>
    </div>

    <?php echo form_submit(['type'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Submit', 'style'=>"margin-top:20px"]); ?>
    <?php echo form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset','style'=>"margin-top:20px"]); ?>

    <?php echo form_close(); ?>
</div>

<?php include('footer.php'); ?>
