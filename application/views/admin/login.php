<?php include('header.php') ?>


<div class="container" style="margin-top:20px">
    <h1>Admin Form</h1>
    <?php if ($error = $this->session->flashdata('login_failed')): ?>
        <div class="row">
            <div class="col-lg-6">
                <div class="alert alert-dismissible alert-danger">
                    <?php echo $error; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php echo form_open('admin/login') ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group" style="margin-top:20px">
                <label for="email">User Name:</label>
                <!-- <input type="email" id="email" name="email" class="form-control"> -->
                <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter User Name', 'name' => 'uname', 'value' => set_value('uname')]); ?>
            </div>
        </div>
        <div class="col lg-6" style="margin-top:40px;"><?php echo form_error('uname'); ?></div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group" style="margin-top:10px">
                <label for="pwdd">Password:</label>
                <!-- <input type="password" id="pwd" class="form-control"> -->
                <?php echo form_password(['class' => 'form-control', 'type' => 'password', 'placeholder' => 'Enter Password', 'name' => 'pass']); ?>
            </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px;"><?php echo form_error('pass'); ?></div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <?php echo form_submit(['type' => 'submit', 'class' => 'btn btn-success w-100 fw-bold', 'value' => 'Submit', 'style' => "margin-top:10px"]); ?>
        </div>
        <div class="col-lg-2">
            <?php echo form_reset(['type' => 'reset', 'class' => 'btn btn-danger w-100 fw-bold', 'value' => 'Reset', 'style' => "margin-top:10px"]); ?>
        </div>
        <div class="col-lg-2">
            <?php echo anchor('admin/register/', "Sign Up", 'class="btn btn-primary link-class mt-2 w-100 fw-bold"'); ?>
        </div>

    </div>

</div>


<?php //echo validation_errors(); ?>
<?php include('footer.php') ?>