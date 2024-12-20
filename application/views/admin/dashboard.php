
<?php include("header.php"); ?>
<?php //echo print_r("articles"); ?>

<div class="container" style="margin-top:50px;">
    
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Article Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($articles)) : ?> 
                        <?php foreach ($articles as $art): ?>
                        <tr>
                            <td><?php echo $art->id; ?></td>
                            <td><?php echo $art->article_title; ?></td>
                            <td><a href="" class="btn btn-primary">Edit</a></td>
                            <td><a href="" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php endforeach; ?> 
                        <?php else: ?>
                            <tr>
                            <td colspan='3'>Not Data Available</td>
                            </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
</div>
<form action="logout" method="post">
        <button type="submit">Logout</button>
    </form>

<?php include('footer.php'); ?>