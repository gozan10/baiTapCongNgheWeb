<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="login-container p-5">
        <h3>
            <b>Login Form</b>
        </h3>
        <form method="POST" action="login.php">

            <div class="form-group col-6">
                <label for="">Username:</label>
                <input type="text" class="form-control" />
            </div>
            <div class="form-group col-6 mb-3">
                <label for="">Password:</label>
                <input type="password" class="form-control" />
            </div>
            <div>
                <button type="button" class="btn btn-primary" class="col-3">Reset</button>
                <button type="submit" class="btn btn-warning" class="col-3">Login</button>
            </div>
        </form>
    </div>


</body>

</html>