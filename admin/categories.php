<?php
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = $_POST['category'];
    $msg = "";
    if ($category != "") {
        if ($category_obj->addCategory($category)) {
            $msg = "<div class='alert alert-success' id='msg'>Category Added</div>";
        } else {
            $msg = "<div class='alert alert-danger' id='msg'>Something went wrong</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger' id='msg'>This field is needed</div>";
    }
}

// delete category

if (isset($_GET['delete_cat'])) {
    $id = $_GET['delete_cat'];
    if ($category_obj->removeCategory($id)) {
        header("Location: categories.php?message=$id+deleted+successfully");
    } else {
        $message = "<div class='alert alert-danger' id='msg'>Category is associated with a post.</div>";
    }
}

?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include 'includes/navigation.php'; ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Welcome to the Administration Panel
                    </h1>
                    <div class="col-sm-6">
                        <?php

                        if (isset($msg)) {
                            echo $msg;
                        }

                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" name="category" placeholder="Category Title" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="cat_add" value="Add Category" class="btn btn-primary">
                            </div>
                        </form>

                    </div>
                    <div class="col-sm-6">
                        <?php

                        if (isset($message)) {
                            echo $message;
                        }

                        ?>
                        <?php
                        if ($category_obj->loadCategories()) :
                        ?>
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($category_obj->loadCategories() as $category) :
                                        $id = $category->id;
                                        $cat = $category->category;
                                        echo "<tr>
                                            <td>$id</td>
                                            <td>$cat</td>
                                            <td><a href='?delete_cat=$cat' class='btn btn-danger'>Delete</a></td>
                                        </tr>"
                                    ?>

                                <?php
                                    endforeach;
                                    echo "</tbody>
                                </table>";
                                else :
                                    echo "<h2 class='text-center'>No Category yet!</h2>";
                                endif;

                                ?>
                    </div>
                    <!-- /.row -->
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
    try {
        let msg = document.getElementById('msg');
        setTimeout(() => {
            msg.style.display = "none";
        }, 5000);
    } catch (error) {
        console.log(error);
    }
</script>
</body>

</html>