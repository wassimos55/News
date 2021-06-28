<?php include 'includes/header.php'; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include 'includes/navigation.php'; ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Update your profile picture here and password
                    </h1>
                    <div class="col-lg-6">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="file" name="picture">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="profile_update" class="btn btn-success" value="Update Profile picture">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="password" name="old_password" placeholder="Old Password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" name="new_password" placeholder="New Password" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="password_update" class="btn btn-success" value="Update Password">
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