<?php require '../controller/admin.controller.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>planet.DEV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div id="navbar" class="navbar d-flex justify-content-center">
        <div id="planet-dev"><span id="planet" class="fs-2 fw-bold">Planet</span><span id="dev" class="fs-2 fw-bold">.dev</span></div>
    </div>
    
    <div id="login-page" class="d-flex flex-column align-items-center justify-content-center" style="background-image: url(../assets/images/bg.jpg);">
        <?php 
        if(isset($_SESSION['error'])) {
            echo'<div class="alert alert-warning alert-dismissible fade show position-absolute top-0 me-3" role="alert" style="margin-top:60px;width:100%;">
                    <strong>'.$_SESSION['error'].'</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        ?>
        <div id="login-container" class="rounded-1 shadow container" style="height:400px;">
            <form action="../controller/admin.controller.php" method="POST" class="d-flex flex-column w-100 pt-4 py-3">
                <div class="m-auto w-100 mb-4">
                    <label for="register-name" class="fw-bold">NAME</label><br>
                    <input type="text" name="register-name" class="my-input">
                </div>
                <div class="m-auto w-100 mb-4">
                    <label for="register-email" class="fw-bold">EMAIL</label><br>
                    <input type="email" name="register-email" class="my-input">
                </div>

                <div class="m-auto w-100 mb-4">
                    <label for="register-password" class="fw-bold">PASSWORD</label><br>
                    <input type="password" name="register-password" class="my-input">
                    <a href="login.php" style="text-decoration:none;">Already have an accont</a>
                </div>
                <button type="submit" name="admin-register">LOGIN</button>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>