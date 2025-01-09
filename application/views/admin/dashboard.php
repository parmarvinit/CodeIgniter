<?php include("header.php"); ?>

<style>
.pagination {
  display: flex;
  padding-left: 0;
  list-style: none;
  border-radius: 0.25rem;
}

.pagination .page-item {
  margin: 0 5px;
}

.pagination .page-item a {
  text-decoration: none;
  padding: 0.5rem 0.75rem;
  color: #007bff; /* Bootstrap primary color */
  border: 1px solid #dee2e6;
  border-radius: 0.25rem;
  background-color: #fff;
  transition: background-color 0.2s ease, color 0.2s ease;
}

.pagination .page-item a:hover {
  color: #0056b3; /* Darker shade of Bootstrap primary */
  background-color: #e9ecef; /* Light gray for hover */
}

.pagination .page-item.active a {
  color: #fff;
  background-color: #007bff; /* Bootstrap primary color */
  border-color: #007bff;
}

.pagination .page-item.active a:hover {
  color: #fff;
  background-color: #0056b3; /* Darker shade of active */
  border-color: #0056b3;
}

.pagination .page-item.disabled a {
  color: #6c757d; /* Disabled gray */
  pointer-events: none;
  background-color: #fff;
  border-color: #dee2e6;
}

</style>


<div class="container" style="margin-top:50px;">
    <div class="row">
        <!-- <a href="add_articles" class="btn btn-lg btn-primary">Add Articles</a> -->
        <?= anchor('admin/add_articles', 'Add Articles', ['class' => 'btn btn-lg btn-primary']); ?>
    </div>
    <?php if ($msg = $this->session->flashdata('msg')): 
        $msg_class = $this->session->flashdata('msg_class')
        ?>
        <div class="row">

            <div class="mt-3 p-2 text-center alert <?= $msg_class; ?>" id="success-message">
                <?php echo $msg; ?>
            </div>
        </div>  
    <?php endif; ?>
    

</div>



<div class="container" style="margin-top:50px;">
    <table class="table table-bordered ">
        <thead>
            <tr>

                <th>No.</th>
                <th>Article Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        
        <tbody>
            <?php if (count($articles)): ?>
                <?php $i = 0; ?>
                <?php foreach ($articles as $art): ?>

                    <tr>
                        <td><?php echo ++$i; ?></td>
                        <td><?php echo $art->article_title; ?></td>
                        <td>
                        <?=
                                    form_open('admin/edit_article'),
                                    form_hidden('id', $art->id),
                                    form_submit(['type' => 'submit', 'class' => 'btn btn-primary' , 'value' => 'Edit']),         
                                    form_close();
                            ?>
                        </td>
                        <td>
                            <?=
                                    form_open('admin/delete_article'),
                                    form_hidden('id', $art->id),
                                    form_submit(['type' => 'submit', 'class' => 'btn btn-danger ' , 'value' => 'Delete']),         
                                    form_close();
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan='3'>Not Data Available</td>
                </tr>
            <?php endif; ?>
        </tbody>

        
    </table>
    <?=  $this->pagination->create_links(); ?>

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