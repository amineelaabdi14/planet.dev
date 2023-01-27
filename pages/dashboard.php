<?php 
    require'../controller/admin.controller.php';
    $_SESSION['page']='dashboard';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body  style="background-color:rgb(244, 244, 244);">
    <?php  require '../includes/navbar.inc.php'; ?>
    <div id="page-content" class="d-flex justify-content-between" style="padding-top: 60px;">
        <?php  require '../includes/sidebar.inc.php'; ?>
        <div id="dashboard" class="py-5">

            <div id="stats" class="d-flex flex-wrap flex-lg-row justify-content-center justify-content-lg-between m-auto mb-5" style="width:70vw">
                <div id="num-articles" class="stat text-white fs-4 fw-bold text-center m-2"><p>Articles</p><span id="inner-num-articles"><?= get_articles_stats()?></span></div>
                <div id="num-users" class="stat text-white fs-4 fw-bold text-center m-2"><p>Users</p><span id="inner-num-users"><?= get_users_stats() ?></span></div>
                <div id="num-aut" class="stat text-white fs-4 fw-bold text-center m-2"><p>Authors</p><span id="inner-num-authors"><?= get_authors_stats()?></span></div>
            </div>
            <div class="d-flex justify-content-end mt-5 mb-5 me-5">
                <button  id="add-author" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-right:70px;">Add</button>
            </div>
            <div id="table-container" class="shadow table-responsive mb-4 rounded p-2" style="background-color: white;">
                <table class="table" id="my-articles">
                    <thead>
                        <tr>
                            <th>Articles Name</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        show_articles(); ?>
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
                    <h5 class="modal-title" id="exampleModalLabel">Article</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../controller/admin.controller.php" class="d-flex flex-column m-auto align-items-center" method="POST">
                        <div id="add-aticle-form">
                            <div id="multi-form" class="form-counter">
                                <label for="article-name">Name</label>
                                <input type="text" name="article-name" class="my-input">
                                <label for="article-cat">Category</label>
                                <select type="text" name="article-cat" class="my-input">
                                    <?php set_categories(); ?>
                                </select>
                                <label for="article-auth">Author</label>
                                <select type="text" name="article-auth" class="my-input">
                                    <?php set_authors(); ?>
                                </select>
                                <label for="content" class="">Content</label>
                                <textarea rows="5" class="w-100" name="content" ></textarea>
                                <input type="text" name="article-id" style="display:none;">
                            </div>
                        </div>
                        <button type="button" id="add-multiple" onclick="add_form()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                                </svg>
                        </button>
                        <button id="add-article" type="button" class="w-100" onclick="send_data()" data-bs-dismiss="modal" aria-label="Close">Add All</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script src="https://kit.fontawesome.com/6360d947ff.js" crossorigin="anonymous"></script>
    <script>$(document).ready( function () {
    $('#my-articles').DataTable();
} );</script>
</body>
</html>