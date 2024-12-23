<?php include('header.php') ?>


<div class="container" style="margin-top:20px">
    <h1>Add Articles</h1>
   <?php //echo form_hidden('userid','$this->session->userdata(`loginId`)'); ?>
    <?php echo form_open('Admin/userValidation') ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group" style="margin-top:20px">
                <label for="title">Article Title</label>
               
                <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Article Title', 'name' => 'title', 'value' => set_value('title')]); ?>
            </div>
        </div>
        <div class="col lg-6" style="margin-top:40px;"><?php echo form_error('title'); ?></div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group" style="margin-top:10px">
                <label for="body">Article Body</label>
                
                <?php echo form_textarea(['class' => 'form-control', 'type' => 'textarea', 'placeholder' => 'Write Something New ...', 'name' => 'body']); ?>
            </div>
        </div>
        <div class="col lg-6" style="margin-top:40px;"><?php echo form_error('body'); ?></div>
    </div>
  
    <?php echo form_submit(['type' => 'submit', 'class' => 'btn-default', 'value' => 'submit', 'style' => "margin-top:10px"]); ?>
    <?php echo form_reset(['type' => 'reset', 'class' => 'btn-default', 'value' => 'Reset', 'style' => "margin:10px"]); ?>
    <?php //echo anchor('admin/register/', "Sign Up?", 'class="link-class"'); ?>
</div>

<?php //echo validation_errors(); ?>
<?php include('footer.php') ?>