<?php

include 'includes/header.php';

if (isset($_GET['page']) && $_GET['page'] != "" && $_GET['page'] >= 1) {
	Posts::$pageno = $_GET['page'];
} else {
	Posts::$pageno = 1;
}

?>

<div id="wrapper">

	<!-- Navigation -->
	<?php include 'includes/navigation.php'; ?>


	<div id="page-wrapper">

		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="row">

				<h1 class="page-header">
					Welcome to the Administration Panel
				</h1>
				<?php
				if (isset($_GET['source'])) {
					$source = $_GET['source'];

					if ($source == "add_new") {
						include_once "includes/addpost.php";
					} else {
						include_once "includes/post.php";
					}
				} else {
					include_once "includes/post.php";
				}
				?>
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