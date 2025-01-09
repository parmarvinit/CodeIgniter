<?php include('header.php') ?>


<div class="container" style="margin-top:20px">
    <h1>Edit Articles</h1>
    <?php echo form_open('Admin/updatearticle') ?>
    <?php echo form_hidden('id', $article->id); ?>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group" style="margin-top:20px">
                <label for="article_title">Article Title</label>
                
                <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Article Title', 'name' => 'article_title', 'value' => set_value('article_title',$article->article_title)]); ?>
            </div>
        </div>
        <div class="col lg-6 text-danger" style="margin-top:40px;"><?php echo form_error('article_title'); ?></div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group" style="margin-top:10px">
                <label for="article_body">Article Body</label>

                <?php echo form_textarea(['class' => 'form-control', 'type' => 'textarea', 'placeholder' => 'Write Something New ...', 'name' => 'article_body','value' => set_value('article_body',$article->article_body)]); ?>
            </div>
        </div>
        <div class="col lg-6  text-danger" style="margin-top:40px;"><?php echo form_error('article_body'); ?></div>
    </div>
    <div class="row">
        <div class="col-3">
            <?php echo form_submit(['type' => 'submit', 'class' => 'btn btn-success w-100', 'value' => 'Submit']); ?>
        </div>
        <div class="col-3">
            <?php echo form_reset(['type' => 'reset', 'class' => 'btn btn-danger w-100', 'value' => 'Reset']); ?>
        </div>
       

    </div>
</div>

</div>

<?php //echo validation_errors(); ?>
<?php include('footer.php') ?>