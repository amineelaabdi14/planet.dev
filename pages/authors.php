<?php 
    require'../controller/admin.controller.php';
    $_SESSION['page']='authors';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Authors</title>
</head>
<body>
    <?php  require '../includes/navbar.inc.php'; ?>
    <div id="page-content" class="d-flex justify-content-between" style="padding-top: 60px;">
        <?php  require '../includes/sidebar.inc.php'; ?>
        <div id="dashboard" class="">
            <div class="d-flex justify-content-end mt-5 mb-5 me-5">
                <button  id="add-author" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-right:70px;">Add</button>
            </div>
               
                <div id="table-container" class="shadow table-responsive mb-4" style="background-color: white;">
                        <table class="table rounded p-2">
                            <thead>
                                <tr>
                                    <th>hamid</th>
                                    <th>hamid</th>
                                    <th>hamid</th>
                                    <th>hamid</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>content</td>
                                    <td>content</td>
                                    <td>content</td>
                                    <td>content</td>
                                </tr>
                                <tr>
                                    <td>content</td>
                                    <td>content</td>
                                    <td>content</td>
                                    <td>content</td>
                                </tr>
                                <tr>
                                    <td>content</td>
                                    <td>content</td>
                                    <td>content</td>
                                    <td>content</td>
                                </tr>
                                <tr>
                                    <td>content</td>
                                    <td>content</td>
                                    <td>content</td>
                                    <td>content</td>
                                </tr>
                                <tr>
                                    <td>content</td>
                                    <td>content</td>
                                    <td>content</td>
                                    <td>content</td>
                                </tr>
                                <tr>
                                    <td>content</td>
                                    <td>content</td>
                                    <td>content</td>
                                    <td>content</td>
                                </tr>
                                <tr>
                                    <td>content</td>
                                    <td>content</td>
                                    <td>content</td>
                                    <td>content</td>
                                </tr>
                                <tr>
                                    <td>content</td>
                                    <td>content</td>
                                    <td>content</td>
                                    <td>content</td>
                                </tr>
                                <tr>
                                    <td>content</td>
                                    <td>content</td>
                                    <td>content</td>
                                    <td>content</td>
                                </tr>
                                <tr>
                                    <td>content</td>
                                    <td>content</td>
                                    <td>content</td>
                                    <td>content</td>
                                </tr>
                                <tr>
                                    <td>content</td>
                                    <td>content</td>
                                    <td>content</td>
                                    <td>content</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../controller/admin.controller.php" method="POST">
                    <label for="author">AUTHOR</label>
                    <input type="text" name="author" class="my-input">
                            <button type="submit" name="add-author" class="btn text-white w-100 mt-4" style="background-color:#00c010;">Save changes</button>
                </form>
            </div>
            </div>
        </div>
    </div>


    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/6360d947ff.js" crossorigin="anonymous"></script>
</body>
</html>