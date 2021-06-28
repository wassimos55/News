<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-8 mx-auto">
                <h3 class="text-center">Register Here</h3>
                <div class="card card-default">
                    <div class="card card-body">
                        <form action="process.php" method="post" autocomplete="off">
                            <div class="form-group">
                                <input type="text" name="username" id="username" placeholder="Username" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Register" name="register" class="btn btn-success btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>