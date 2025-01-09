<?php include('header.php') ?>

<div class="container mb-5 " style="margin-top:20px">
    <h1>Registration Form</h1>
    <?php if ($msg = $this->session->flashdata('user')):
        $msg_class = $this->session->flashdata('user_class')
            ?>
        <div class="row">

            <div class="mt-3 p-2 text-center alert <?= $msg_class; ?>" id="success-message">
                <?php echo $msg; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php echo form_open('admin/sendmail'); ?>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group" style="margin-top:20px">
                <label for="firstname">First Name:</label>
                <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter First Name', 'name' => 'firstname', 'value' => set_value('firstname')]); ?>
            </div>
        </div>
        <div class="col-lg-6 mt-5"><span><?php echo form_error('firstname'); ?></span></div>

    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group" style="margin-top:20px">
                <label for="lastname">Last Name:</label>
                <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Last Name', 'name' => 'lastname', 'value' => set_value('lastname')]); ?>
            </div>
        </div>
        <div class="col-lg-6 mt-5"><span><?php echo form_error('lastname'); ?></span></div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group" style="margin-top:20px">
                <label for="username">User Name:</label>
                <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter User Name', 'name' => 'username', 'value' => set_value('username')]); ?>
            </div>
        </div>
        <div class="col-lg-6 mt-5"><span><?php echo form_error('username'); ?></span></div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group" style="margin-top:20px">
                <label for="password">Password:</label>
                <?php echo form_password(['class' => 'form-control', 'placeholder' => 'Enter Password', 'name' => 'password']); ?>
            </div>
        </div>
        <div class="col-lg-6 mt-5"><span><?php echo form_error('password'); ?></span></div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group" style="margin-top:20px">
                <label for="email">Email:</label>
                <?php echo form_input(['class' => 'form-control', 'type' => 'email', 'placeholder' => 'Enter Email ID', 'name' => 'email', 'value' => set_value('email')]); ?>
            </div>
        </div>
        <div class="col-lg-6 mt-5"><span><?php echo form_error('email'); ?></span></div>

    </div>
    <div class="row">
        <div class="col-lg-2">
            <?php echo form_submit(['type' => 'submit', 'class' => 'btn btn-success w-100' , 'value' => 'Submit', 'style' => "margin-top:20px"]); ?>
        </div>
        <div class="col-lg-2">
            <?php echo form_reset(['type' => 'reset', 'class' => 'btn btn-danger w-100', 'value' => 'Reset', 'style' => "margin-top:20px"]); ?>
        </div>
        <div class="col-lg-2">
            <?php echo anchor('admin/login','Login',['type' => 'button', 'class' => 'btn btn-primary w-100', 'value' => 'Login', 'style' => "margin-top:20px"]); ?>
        </div>
    </div>

    <?php echo form_close(); ?>
</div>
<script>

    setTimeout(function () {
        var successMessage = document.getElementById('success-message');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
    }, 3000); 
</script>
<?php include('footer.php'); ?>