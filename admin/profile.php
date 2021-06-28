<?php include 'includes/header.php'; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include 'includes/navigation.php';

    $details = $auth->getDetails($user_id);

    ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to your profile page
                    </h1>
                    <div class="col-lg-8">
                        <form action="process.php" method="post">
                            <div class="form-group">
                                * required<input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?php echo $details->username; ?>">
                            </div>
                            <div class="form-group">
                                * required<input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo $details->email; ?>">
                            </div>
                            <div class="form-group">
                                * required<textarea name="description" placeholder="Description" cols="5" rows="5" class="form-control"><?php echo $details->description; ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" name="facebook" class="form-control" placeholder="Facebook Username" value="<?php echo $details->fb; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="github" class="form-control" placeholder="Github Username" value="<?php echo $details->github; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="youtube" class="form-control" placeholder="Youtube Channel ID" value="<?php echo $details->ytb; ?>">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="user_detail" class="btn btn-success" value="Update Profile">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="bootstrap/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>